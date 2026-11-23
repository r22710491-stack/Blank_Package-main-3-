@echo off
setlocal
cd /d "%~dp0"

rem --- Find PHP (PATH first, then common XAMPP/Laragon locations) ---
where php >nul 2>nul
if %errorlevel%==0 (
    set "PHP=php"
) else if exist "C:\xampp\php\php.exe" (
    set "PHP=C:\xampp\php\php.exe"
) else if exist "C:\laragon\bin\php\php.exe" (
    set "PHP=C:\laragon\bin\php\php.exe"
) else (
    echo [ERROR] PHP was not found.
    echo Install PHP 8.1+ and add it to PATH, then run this file again.
    pause
    exit /b 1
)

rem --- First-run setup: .env, app key and SQLite database ---
if not exist ".env" copy ".env.example" ".env" >nul

findstr /b /c:"APP_KEY=base64:" ".env" >nul 2>nul
if errorlevel 1 "%PHP%" artisan key:generate --ansi

if not exist "database\database.sqlite" type nul > "database\database.sqlite"

if not exist "vendor\autoload.php" (
    echo Installing Composer dependencies...
    composer install --no-interaction --no-security-blocking
)

"%PHP%" artisan migrate --force

rem --- Start the development server ---
"%PHP%" artisan serve %*
