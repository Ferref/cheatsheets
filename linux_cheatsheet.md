
# Linux Command Line Cheatsheet

## File and Directory Management

### List Files and Directories
```bash
ls
```
- Common options:
  - `-l`: Long format.
  - `-a`: Show hidden files.
  - `-h`: Human-readable file sizes.

### Change Directory
```bash
cd <directory_path>
```
- `cd ~`: Change to home directory.
- `cd ..`: Move up one directory.

### Create a Directory
```bash
mkdir <directory_name>
```

### Remove a Directory
```bash
rmdir <directory_name>
```

### Create an Empty File
```bash
touch <file_name>
```

### Remove a File or Directory
```bash
rm <file_name>
```
- For directories: `rm -r <directory_name>`

### Copy Files and Directories
```bash
cp <source> <destination>
```
- For directories: `cp -r <source_directory> <destination_directory>`

### Move or Rename Files and Directories
```bash
mv <source> <destination>
```

### View File Contents
```bash
cat <file_name>
```
- For paginated output: `less <file_name>`

### Search for a String in a File
```bash
grep "search_term" <file_name>
```

### Count Lines, Words, and Characters in a File
```bash
wc <file_name>
```

## Permissions and Ownership

### Change File Permissions
```bash
chmod <permissions> <file_name>
```
- Example: `chmod 755 file.sh` (rwx for owner, rx for group and others).

### Change File Ownership
```bash
chown <owner>:<group> <file_name>
```

## System Information

### Show Current Directory
```bash
pwd
```

### Show Disk Space Usage
```bash
df -h
```

### Show Memory Usage
```bash
free -h
```

### Show Running Processes
```bash
ps aux
```
- To search for a process: `ps aux | grep <process_name>`

### Display Network Configuration
```bash
ifconfig
```
- On newer systems: `ip addr`

### Show System Uptime
```bash
uptime
```

## Process Management

### Kill a Process
```bash
kill <PID>
```
- Force kill: `kill -9 <PID>`

### Check CPU Usage by Processes
```bash
top
```
- Alternative: `htop` (if installed).

## Package Management

### Install a Package (Debian/Ubuntu)
```bash
sudo apt install <package_name>
```

### Remove a Package (Debian/Ubuntu)
```bash
sudo apt remove <package_name>
```

### Install a Package (Red Hat/CentOS)
```bash
sudo yum install <package_name>
```

### Update Packages (Debian/Ubuntu)
```bash
sudo apt update
sudo apt upgrade
```

## File Compression

### Create a Compressed Archive (tar.gz)
```bash
tar -czvf <archive_name>.tar.gz <directory_or_file>
```

### Extract a Compressed Archive
```bash
tar -xzvf <archive_name>.tar.gz
```

### Zip a Directory
```bash
zip -r <archive_name>.zip <directory>
```

### Unzip an Archive
```bash
unzip <archive_name>.zip
```

## Networking

### Ping a Server
```bash
ping <hostname_or_ip>
```

### Check Open Ports
```bash
netstat -tuln
```
- Alternatively, use: `ss -tuln`

### SSH into a Remote Server
```bash
ssh <user>@<hostname_or_ip>
```

## Search and Find

### Find Files and Directories
```bash
find <directory> -name <file_name>
```

### Locate Files
```bash
locate <file_name>
```
- Update locate database: `sudo updatedb`

## Miscellaneous

### View System Logs
```bash
tail -f /var/log/syslog
```

### Show Calendar and Date
```bash
cal
date
```

### Set an Alias for a Command
```bash
alias <alias_name>="<command>"
```
- Example: `alias ll="ls -la"`

### Check User Disk Usage
```bash
du -sh <directory_or_file>
```

## User Management

### Add a User
```bash
sudo adduser <username>
```

### Delete a User
```bash
sudo deluser <username>
```

### Add User to a Group
```bash
sudo usermod -aG <group_name> <username>
```

### Switch User
```bash
su - <username>
```

---

This cheatsheet summarizes common Linux commands for file management, system monitoring, networking, and more.
