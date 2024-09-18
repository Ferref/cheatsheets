
# Pandas Cheatsheet

## Importing Pandas
```python
import pandas as pd
```

## Creating DataFrames

### From a Dictionary
```python
data = {'col1': [1, 2], 'col2': [3, 4]}
df = pd.DataFrame(data)
```

### From a List of Lists
```python
data = [[1, 2], [3, 4]]
df = pd.DataFrame(data, columns=['col1', 'col2'])
```

### From a CSV File
```python
df = pd.read_csv('file.csv')
```

## Viewing Data

### First or Last 5 Rows
```python
df.head()   # First 5 rows
df.tail()   # Last 5 rows
```

### Summary Statistics
```python
df.describe()
```

### Data Types of Columns
```python
df.dtypes
```

### Shape of DataFrame
```python
df.shape
```

### Info on DataFrame
```python
df.info()
```

### Accessing Column Data
```python
df['col1']
```

### Accessing Multiple Columns
```python
df[['col1', 'col2']]
```

## Data Selection

### Select Rows by Index
```python
df.iloc[0]    # First row
df.iloc[0:3]  # First three rows
```

### Select Rows by Condition
```python
df[df['col1'] > 2]
```

### Select Specific Rows and Columns
```python
df.loc[0:2, ['col1', 'col2']]
```

## Data Manipulation

### Adding a New Column
```python
df['new_col'] = df['col1'] + df['col2']
```

### Dropping Columns or Rows
```python
df.drop(columns=['col1'])     # Drop column
df.drop([0, 1], axis=0)       # Drop rows
```

### Renaming Columns
```python
df.rename(columns={'old_name': 'new_name'})
```

### Sorting Data
```python
df.sort_values(by='col1')
```

### Reset Index
```python
df.reset_index(drop=True)
```

### Set Index
```python
df.set_index('col1')
```

## Handling Missing Data

### Detect Missing Data
```python
df.isnull()
```

### Drop Missing Data
```python
df.dropna()
```

### Fill Missing Data
```python
df.fillna(value=0)
```

## Grouping and Aggregation

### Group By and Aggregate
```python
df.groupby('col1').agg({'col2': 'sum'})
```

### Group By and Apply Functions
```python
df.groupby('col1').apply(lambda x: x['col2'].mean())
```

## Merging and Joining

### Merge DataFrames
```python
pd.merge(df1, df2, on='key')
```

### Join DataFrames
```python
df1.join(df2.set_index('key'), on='key')
```

### Concatenate DataFrames
```python
pd.concat([df1, df2])
```

## Exporting Data

### Export to CSV
```python
df.to_csv('file.csv', index=False)
```

### Export to Excel
```python
df.to_excel('file.xlsx', index=False)
```

---

This cheatsheet provides a quick overview of the most common Pandas operations for data manipulation and analysis.
