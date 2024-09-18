
# Python API / Requests Cheatsheet (Advanced)

## Installing Required Libraries
```bash
pip install requests pandas io
```

## Handling API Requests

### Basic GET Request
```python
import requests

response = requests.get('https://api.example.com/data')
print(response.status_code)  # HTTP status code
print(response.json())  # JSON response as a Python dictionary
```

### Sending Headers with Request
```python
headers = {'Authorization': 'Bearer YOUR_TOKEN'}
response = requests.get('https://api.example.com/data', headers=headers)
```

### Handling Query Parameters
```python
params = {'param1': 'value1', 'param2': 'value2'}
response = requests.get('https://api.example.com/data', params=params)
```

### Handling POST Request with JSON Payload
```python
data = {'key1': 'value1', 'key2': 'value2'}
response = requests.post('https://api.example.com/data', json=data)
print(response.json())  # Response in JSON
```

### Handling POST Request with Files
```python
files = {'file': open('example.txt', 'rb')}
response = requests.post('https://api.example.com/upload', files=files)
```

## Downloading CSV Files via API

### Download CSV from URL and Save Locally
```python
url = 'https://api.example.com/data.csv'
response = requests.get(url)

with open('data.csv', 'wb') as file:
    file.write(response.content)
```

### Load CSV Directly into Memory (Pandas)
```python
import pandas as pd
from io import StringIO

url = 'https://api.example.com/data.csv'
response = requests.get(url)
csv_data = StringIO(response.text)  # Convert response to file-like object

df = pd.read_csv(csv_data)
print(df.head())  # View first few rows
```

## Loading and Handling CSV Data

### Load CSV from a Local File
```python
df = pd.read_csv('data.csv')
```

### Loading CSV in Chunks (Memory Efficient)
```python
chunk_size = 1000  # Number of rows per chunk
for chunk in pd.read_csv('data.csv', chunksize=chunk_size):
    process(chunk)  # Replace with your processing function
```

### Reading CSV with Custom Delimiter
```python
df = pd.read_csv('data.csv', delimiter=';')
```

### Saving DataFrame to CSV
```python
df.to_csv('output.csv', index=False)
```

### Appending to an Existing CSV
```python
df.to_csv('output.csv', mode='a', header=False, index=False)
```

## Error Handling in API Requests

### Handling Timeouts and Retry
```python
try:
    response = requests.get('https://api.example.com/data', timeout=5)
    response.raise_for_status()  # Raises an HTTPError if status code is 4xx/5xx
except requests.exceptions.Timeout:
    print("Request timed out")
except requests.exceptions.HTTPError as err:
    print(f"HTTP error occurred: {err}")
except requests.exceptions.RequestException as err:
    print(f"Other error occurred: {err}")
```

## Working with JSON Responses

### Parsing JSON from API Response
```python
response = requests.get('https://api.example.com/data')
data = response.json()  # Convert response to Python dict
```

### Converting Python Object to JSON
```python
import json

data = {'name': 'John', 'age': 30}
json_string = json.dumps(data)
```

### Saving JSON to a File
```python
with open('data.json', 'w') as file:
    json.dump(data, file)
```

## Handling Large CSV Files Efficiently

### Streaming Large Files via Requests
```python
url = 'https://api.example.com/large-data.csv'
response = requests.get(url, stream=True)

with open('large_data.csv', 'wb') as file:
    for chunk in response.iter_content(chunk_size=1024):  # 1 KB chunks
        if chunk:
            file.write(chunk)
```

### Load Large CSV in Chunks and Process
```python
chunk_size = 10000  # Adjust chunk size as needed
for chunk in pd.read_csv('large_data.csv', chunksize=chunk_size):
    # Process each chunk here
    print(chunk.head())
```

## Combining API with CSV Data

### Example: Fetch Data via API and Save as CSV
```python
url = 'https://api.example.com/users'
response = requests.get(url)
data = response.json()

df = pd.DataFrame(data)  # Convert JSON to DataFrame
df.to_csv('users_data.csv', index=False)
```

### Example: Load CSV and Send Data via API
```python
df = pd.read_csv('users_data.csv')
for _, row in df.iterrows():
    data = row.to_dict()
    response = requests.post('https://api.example.com/update', json=data)
```

---

### Load xlsx into DataFrame from web
```python
import requests
import pandas as pd
from io import StringIO

url = 'https://www.hbs.edu/behavioral-finance-and-financial-stability/Documents/ChartData/MapCharts/20160923_global_crisis_data.xlsx'
df = pd.read_excel(url)
df
```

This cheatsheet covers advanced handling of APIs, downloading CSV files, error handling, and efficient memory management for large files using `requests` and `pandas`.
