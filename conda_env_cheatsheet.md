
# Conda Environment Cheatsheet

## Environment Management

### Create a New Environment
```bash
conda create --name <env_name> python=<version>
```
- Example: `conda create --name myenv python=3.9`

### Activate an Environment
```bash
conda activate <env_name>
```

### Deactivate the Current Environment
```bash
conda deactivate
```

### Remove an Environment
```bash
conda env remove --name <env_name>
```

## Package Management

### Install a Package in Active Environment
```bash
conda install <package_name>
```

### Install a Specific Version of a Package
```bash
conda install <package_name>=<version>
```

### Install Multiple Packages
```bash
conda install <package1> <package2>
```

### List Installed Packages
```bash
conda list
```

### Update a Package
```bash
conda update <package_name>
```

### Update Conda
```bash
conda update conda
```

### Remove a Package
```bash
conda remove <package_name>
```

## Environment Export & Import

### Export Environment to a YAML File
```bash
conda env export > environment.yaml
```

### Create an Environment from a YAML File
```bash
conda env create -f environment.yaml
```

### List All Environments
```bash
conda env list
```

## Miscellaneous

### Check Conda Version
```bash
conda --version
```

### Search for a Package
```bash
conda search <package_name>
```

### Clean Unused Packages and Tarballs
```bash
conda clean --all
```

---
