@echo off
echo Starting Laravel, NPM, and FastAPI servers...
echo.

REM Start Laravel (in new window)
echo [1/3] Starting Laravel on port 8000...
start "Laravel Server" cmd /k "php artisan serve"
timeout /t 2

REM Start npm dev (in new window)
echo [2/3] Starting NPM Vite dev server...
start "NPM Dev" cmd /k "npm run dev"
timeout /t 2

REM Start FastAPI (in new window)
echo [3/3] Starting FastAPI on port 8001...
start "FastAPI Server" cmd /k "venv\Scripts\activate && cd fastapi && uvicorn main:app --reload --port 8001"

echo.
echo All services started!
echo - Laravel: http://localhost:8000
echo - FastAPI: http://localhost:8001/docs
echo.
pause