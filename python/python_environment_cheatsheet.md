
# Python Environment Cheatsheet

## Virtual Environments

### Create a Virtual Environment (Python 3)
```bash
python -m venv <env_name>
```
- Creates a virtual environment in the current directory.

### Activate a Virtual Environment
#### On Windows:
```bash
.\<env_name>\Scriptsctivate
```
#### On macOS/Linux:
```bash
source <env_name>/bin/activate
```

### Deactivate the Virtual Environment
```bash
deactivate
```

### Remove the Virtual Environment
- Simply delete the environment folder:
```bash
rm -rf <env_name>
```

## Virtualenv (Alternative)

### Install `virtualenv`
```bash
pip install virtualenv
```

### Create a Virtual Environment
```bash
virtualenv <env_name>
```

### Activate and Deactivate
- Activation and deactivation are the same as with `venv`.

## Managing Dependencies

### Install Packages
```bash
pip install <package_name>
```

### Install from `requirements.txt`
```bash
pip install -r requirements.txt
```

### Freeze Installed Packages
```bash
pip freeze > requirements.txt
```
- Saves the current environment's package list into a `requirements.txt` file.

### List Installed Packages
```bash
pip list
```

### Uninstall a Package
```bash
pip uninstall <package_name>
```

## Virtual Environment Tools

### Using `pipenv`
#### Install `pipenv`
```bash
pip install pipenv
```

#### Create and Activate a Virtual Environment
```bash
pipenv install
```

#### Install a Package with `pipenv`
```bash
pipenv install <package_name>
```

#### Activate a `pipenv` Shell
```bash
pipenv shell
```

### Using `pyenv`
#### Install `pyenv` (macOS/Linux)
```bash
curl https://pyenv.run | bash
```
- Follow the additional setup instructions to add `pyenv` to your shell.

#### List Python Versions
```bash
pyenv install --list
```

#### Install a Python Version
```bash
pyenv install <version>
```

#### Set Global Python Version
```bash
pyenv global <version>
```

### Using `conda` (if you prefer managing Python environments with Conda)
- See the Conda cheatsheet for details on Conda's environment management features.

## Managing Environment Variables

### Setting Environment Variables
#### On Windows:
```bash
set MY_VAR=value
```
#### On macOS/Linux:
```bash
export MY_VAR=value
```

### Accessing Environment Variables in Python
```python
import os
value = os.getenv("MY_VAR")
```

## Environment Isolation Best Practices

1. Always use virtual environments for project-specific dependencies.
2. Freeze dependencies using `pip freeze` or `pipenv lock` to ensure consistent installs.
3. Keep different Python versions and environments isolated using tools like `pyenv` or `conda`.

---

This cheatsheet summarizes key actions and commands for managing Python environments with `venv`, `virtualenv`, `pipenv`, and `pyenv`.
