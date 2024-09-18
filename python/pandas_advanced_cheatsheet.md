
# Pandas Advanced Cheatsheet

## Advanced Joins and Merges

### Inner Join (default behavior)
```python
pd.merge(df1, df2, on='key')
```

### Left Join
```python
pd.merge(df1, df2, on='key', how='left')
```

### Right Join
```python
pd.merge(df1, df2, on='key', how='right')
```

### Outer Join (Full Join)
```python
pd.merge(df1, df2, on='key', how='outer')
```

### Joining on Multiple Columns
```python
pd.merge(df1, df2, on=['key1', 'key2'], how='inner')
```

## Cartesian Product (Cross Join)
```python
df1['key'] = 1
df2['key'] = 1
cartesian_product = pd.merge(df1, df2, on='key').drop('key', axis=1)
```

### Alternative using `pd.merge()`
```python
pd.merge(df1.assign(key=1), df2.assign(key=1), on='key').drop('key', axis=1)
```

## Similarity Percentage between Columns
You can calculate similarity between string columns using fuzzy matching or custom logic.

### Using FuzzyWuzzy for String Similarity
```bash
pip install fuzzywuzzy[speedup]
```

```python
from fuzzywuzzy import fuzz

df['similarity'] = df.apply(lambda row: fuzz.ratio(row['col1'], row['col2']), axis=1)
```

### Custom Similarity Calculation
For numeric data:
```python
df['similarity'] = 100 - (abs(df['col1'] - df['col2']) / ((df['col1'] + df['col2']) / 2) * 100)
```

## Itertools for Advanced Operations

### Cartesian Product using `itertools`
```python
import itertools

df1_values = df1.values.tolist()
df2_values = df2.values.tolist()

cartesian_product = list(itertools.product(df1_values, df2_values))
```

### Grouping with `itertools.groupby`
```python
import itertools

df_sorted = df.sort_values(by='column_to_group')
grouped = itertools.groupby(df_sorted.iterrows(), key=lambda x: x[1]['column_to_group'])

for key, group in grouped:
    group_df = pd.DataFrame([row[1] for row in group])
    print(group_df)
```

## Pivot and Melt

### Pivot (Reshape Data)
```python
pivot_df = df.pivot(index='id', columns='category', values='value')
```

### Melt (Unpivot Data)
```python
melted_df = df.melt(id_vars='id', value_vars=['col1', 'col2'], var_name='variable', value_name='value')
```

## Advanced GroupBy

### Aggregation with Multiple Functions
```python
df.groupby('group_column').agg({'col1': ['mean', 'sum'], 'col2': 'max'})
```

### Apply Custom Function
```python
df.groupby('group_column').apply(lambda x: x['col1'].mean())
```

### Aggregating on Multiple Columns
```python
df.groupby(['group_col1', 'group_col2']).agg({'col1': 'sum', 'col2': 'mean'})
```

## Window Functions

### Rolling Window Calculations
```python
df['rolling_mean'] = df['value'].rolling(window=3).mean()
```

### Expanding Window Calculations
```python
df['expanding_sum'] = df['value'].expanding(min_periods=1).sum()
```

### Cumulative Sum
```python
df['cumulative_sum'] = df['value'].cumsum()
```

## Handling Large Datasets

### Chunking Large CSV Files
```python
chunk_size = 50000
for chunk in pd.read_csv('large_file.csv', chunksize=chunk_size):
    process(chunk)
```

### Memory-Efficient Data Types
```python
df['int_column'] = pd.to_numeric(df['int_column'], downcast='integer')
df['float_column'] = pd.to_numeric(df['float_column'], downcast='float')
```

### Use Dask for Large DataFrames
```bash
pip install dask
```

```python
import dask.dataframe as dd

df = dd.read_csv('large_file.csv')
df.compute()  # Convert back to pandas DataFrame
```

## String Manipulation

### Splitting Strings into Columns
```python
df[['first', 'last']] = df['name'].str.split(' ', expand=True)
```

### Extract Substring using Regex
```python
df['numbers'] = df['text'].str.extract(r'(\d+)')
```

### Check for Substring
```python
df['has_word'] = df['text'].str.contains('word')
```

## Advanced Sorting

### Sort by Multiple Columns
```python
df_sorted = df.sort_values(by=['col1', 'col2'], ascending=[True, False])
```

### Rank Values
```python
df['rank'] = df['value'].rank(method='average')
```

---

This cheatsheet covers advanced Pandas topics like joining, Cartesian products, calculating similarity, using `itertools`, and efficient data handling.
