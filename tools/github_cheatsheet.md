
# GitHub Cheatsheet

## Basic Git Commands

### Initialize a Repository
```bash
git init
```
- Creates a new Git repository in the current directory.

### Clone a Repository
```bash
git clone <repository_url>
```
- Downloads a repository from GitHub to your local machine.

### Check Git Status
```bash
git status
```
- Displays the state of the working directory and staging area.

### Stage Changes
```bash
git add <file_name>
```
- Adds a file to the staging area.

- Stage all changes: `git add .`

### Commit Changes
```bash
git commit -m "commit message"
```
- Commits the staged changes to the local repository with a descriptive message.

### Push Changes
```bash
git push origin <branch_name>
```
- Pushes local commits to the remote repository on the specified branch.

### Pull Changes
```bash
git pull origin <branch_name>
```
- Fetches and merges changes from the remote repository to your local branch.

## Branch Management

### Create a New Branch
```bash
git branch <branch_name>
```
- Creates a new branch.

### Switch Branch
```bash
git checkout <branch_name>
```
- Switches to an existing branch.

- Shortcut to create and switch to a new branch: `git checkout -b <branch_name>`

### Merge Branch
```bash
git merge <branch_name>
```
- Merges the specified branch into the current branch.

### Delete a Branch
```bash
git branch -d <branch_name>
```
- Deletes the branch locally. For remote, use:
```bash
git push origin --delete <branch_name>
```

## Undoing Changes

### Unstage a File
```bash
git reset <file_name>
```
- Removes the file from the staging area but keeps its changes in the working directory.

### Discard Local Changes
```bash
git checkout -- <file_name>
```
- Reverts changes to the last committed state for a file.

### Revert Last Commit
```bash
git revert HEAD
```
- Undoes the last commit while keeping changes in the history.

### Reset to a Specific Commit
```bash
git reset --hard <commit_id>
```
- Resets the repository to the specified commit and discards all changes after it.

## Remote Repositories

### Add a Remote Repository
```bash
git remote add origin <repository_url>
```
- Links your local repository to a remote one.

### List Remote Repositories
```bash
git remote -v
```
- Displays all the remotes linked to your repository.

### Remove a Remote
```bash
git remote remove <remote_name>
```

### Rename a Remote
```bash
git remote rename <old_name> <new_name>
```

## Viewing History

### Show Commit History
```bash
git log
```
- Shows a list of commits made in the repository.

### Show History of a Specific File
```bash
git log -- <file_name>
```

### View Differences Between Commits
```bash
git diff <commit1> <commit2>
```

## Stashing Changes

### Stash Uncommitted Changes
```bash
git stash
```
- Saves uncommitted changes for later and reverts the working directory to the last commit.

### Apply Stashed Changes
```bash
git stash apply
```
- Applies the most recent stashed changes.

### List Stashes
```bash
git stash list
```

### Drop a Stash
```bash
git stash drop
```

## Tagging

### Create a Tag
```bash
git tag -a <tag_name> -m "tag message"
```
- Creates a new annotated tag.

### Push a Tag
```bash
git push origin <tag_name>
```

### List Tags
```bash
git tag
```

## GitHub-Specific Commands

### Fork a Repository
- Go to the repository on GitHub and click the **Fork** button in the upper-right corner.

### Create a Pull Request
- Push your branch to GitHub.
- Navigate to the repository on GitHub.
- Click the **Compare & pull request** button to open a pull request for your changes.

### Close/Resolve an Issue
- Reference an issue in a commit message to automatically close it:
```bash
git commit -m "Fixes #<issue_number>"
```

### Create a GitHub Repository
```bash
curl -u 'username' https://api.github.com/user/repos -d '{"name":"repo_name"}'
```
- Creates a new repository on GitHub using the API.

## Collaboration

### Check for Updates in a Forked Repository
```bash
git remote add upstream <original_repo_url>
git fetch upstream
git merge upstream/main
```
- Syncs your forked repository with the original repository.

### Add a Collaborator
- Navigate to the repository on GitHub.
- Go to **Settings** -> **Manage Access** -> **Invite a collaborator**.

---

### Useful Aliases (Optional)
You can create shortcuts for common commands by setting aliases:
```bash
git config --global alias.co checkout
git config --global alias.br branch
git config --global alias.ci commit
git config --global alias.st status
```

---


## Create GitHub Repo from VS Code Terminal

1. **Open Terminal in VS Code**
   ```bash
   git init
   git add .
   git commit -m "Initial commit"
   ```

2. **Rename `master` to `main`**
   ```bash
   git branch -M main
   ```

3. **Create GitHub Repo**
   ```bash
   gh repo create <repo-name> --public --source=. --remote=origin
   ```

4. **Push to GitHub**
   ```bash
   git push -u origin main
   ```

> **Note:** Use `gh auth login` if not authenticated. Replace `<repo-name>` with your repository name.

---

# How to Copy a GitHub Repository to Another (Preserving Commits)

To copy a GitHub repository to a new repository while keeping the commit history intact, follow these steps:

1. **Clone the Original Repository**
   
   ```bash
   git clone https://github.com/username/original-repo.git
   ```

2. **Navigate to the Cloned Repository Folder**

   ```bash
   cd original-repo
   ```

3. **Remove the Remote Origin**
   
   ```bash
   git remote remove origin
   ```

4. **Add the New Remote Repository**
   
   ```bash
   git remote add origin https://github.com/username/new-repo.git
   ```

5. **Push to the New Repository**
   
   ```bash
   git push -u origin main
   ```

Replace `main` with your default branch name if it's different.