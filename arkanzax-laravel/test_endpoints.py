import os
import time
import json
import urllib.request
import urllib.error
import ssl

# Define colors for terminal output
class Colors:
    GREEN = '\033[92m'
    RED = '\033[91m'
    CYAN = '\033[96m'
    RESET = '\033[0m'

# Fallback basic colors for Windows without ansi
if os.name == 'nt':
    os.system('color')

# Path to your Laravel .env file
ENV_PATH = os.path.join(os.path.dirname(__file__), '.env')

def load_env():
    env_vars = {}
    if os.path.exists(ENV_PATH):
        with open(ENV_PATH, 'r') as f:
            for line in f:
                line = line.strip()
                if line and not line.startswith('#') and '=' in line:
                    key, value = line.split('=', 1)
                    # Remove quotes
                    value = value.strip('"').strip("'")
                    env_vars[key.strip()] = value.strip()
    return env_vars

env_config = load_env()

# Fetch API configurations from .env
API_BASE_URL = env_config.get('API_BASE_URL', 'https://admin.arkanzax.com/a/public/api/v1')
API_KEY = env_config.get('API_KEY')
API_TENANT_ID = env_config.get('API_TENANT_ID')

if not API_KEY or not API_TENANT_ID:
    print(f"{Colors.RED}Error: API_KEY or API_TENANT_ID not found in .env file.{Colors.RESET}")
    print("Please make sure you are running this script from the laravel root directory where the .env file is located.")
    exit(1)

HEADERS = {
    'X-API-KEY': API_KEY,
    'X-Tenant-ID': API_TENANT_ID,
    'Accept': 'application/json'
}

# List of endpoints to test
ENDPOINTS = [
    '/sliders',
    '/blogs-features?number=3',
    '/items-features?number=6',
    '/testimonials',
    '/pixels-scripts',
    '/portfolios',
    '/portfolio-categories',
    '/items',
    '/item-types',
    '/blogs',
    '/categories',
    '/offers',
    '/offer-types',
    '/custom-pages',
    '/settings',
]

def print_result(endpoint, success, status_code, response_time, error=None):
    time_str = f"{response_time:.2f}s"
    if success:
        print(f"{Colors.GREEN}[SUCCESS]{Colors.RESET} {endpoint.ljust(35)} | Status: {status_code} | Time: {time_str}")
    else:
        err_msg = f" | Error: {error}" if error else ""
        print(f"{Colors.RED}[FAILED] {Colors.RESET} {endpoint.ljust(35)} | Status: {status_code} | Time: {time_str}{err_msg}")

def test_endpoint(endpoint):
    url = f"{API_BASE_URL.rstrip('/')}/{endpoint.lstrip('/')}"
    start_time = time.time()
    
    # Disable SSL verification for Laravel withoutVerifying() context
    ctx = ssl.create_default_context()
    ctx.check_hostname = False
    ctx.verify_mode = ssl.CERT_NONE
    
    req = urllib.request.Request(url, headers=HEADERS)
    
    try:
        with urllib.request.urlopen(req, context=ctx, timeout=15) as response:
            end_time = time.time()
            response_time = end_time - start_time
            status_code = response.getcode()
            body = response.read().decode('utf-8')
            
            if status_code == 200:
                try:
                    data = json.loads(body)
                    has_data = 'data' in data
                    if has_data:
                        print_result(endpoint, True, status_code, response_time)
                    else:
                        print_result(endpoint, True, status_code, response_time, error="Missing 'data' wrapper")
                except json.JSONDecodeError:
                    print_result(endpoint, False, status_code, response_time, error="Invalid JSON response")
            else:
                print_result(endpoint, False, status_code, response_time, error="Non-200 OK")
                
    except urllib.error.HTTPError as e:
        end_time = time.time()
        error_body = e.read().decode('utf-8')[:100]
        print_result(endpoint, False, e.code, end_time - start_time, error=error_body)
    except urllib.error.URLError as e:
        end_time = time.time()
        print_result(endpoint, False, "N/A", end_time - start_time, error=str(e.reason))
    except Exception as e:
        end_time = time.time()
        print_result(endpoint, False, "N/A", end_time - start_time, error=str(e))

if __name__ == "__main__":
    print(f"{Colors.CYAN}==================================================")
    print(f"Arkanzax API Endpoints Validation Test")
    print(f"=================================================={Colors.RESET}")
    print(f"Base URL: {API_BASE_URL}")
    print(f"Tenant ID: {API_TENANT_ID}")
    print("-" * 65)

    for endpoint in ENDPOINTS:
        test_endpoint(endpoint)
        time.sleep(0.1) # Small delay to avoid hitting rate limits instantly
    
    print("-" * 65)
    print(f"{Colors.CYAN}Test completed.{Colors.RESET}")
