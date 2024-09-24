
# Pandas and Scikit-Learn Advanced Concepts Cheatsheet

## 1. Advanced Pandas Operations

### 1.1 MultiIndex
```python
import pandas as pd

# Create MultiIndex: Useful for handling data with multiple levels of index, such as hierarchical data.
index = pd.MultiIndex.from_tuples([('A', 1), ('A', 2), ('B', 1), ('B', 2)])
df = pd.DataFrame({'Value': [10, 20, 30, 40]}, index=index)
print(df)

# Accessing elements: Easy access to different levels of the index.
df.loc['A']
df.loc[('A', 1)]
```

### 1.2 Pivot Tables
```python
# Create a pivot table: Useful for summarizing and aggregating data based on multiple dimensions.
df = pd.DataFrame({
    'A': ['foo', 'foo', 'foo', 'bar', 'bar', 'bar'],
    'B': ['one', 'one', 'two', 'two', 'one', 'one'],
    'C': ['small', 'large', 'large', 'small', 'small', 'large'],
    'D': [1, 2, 2, 3, 3, 4],
    'E': [2, 4, 5, 5, 6, 7]
})
pivot_table = df.pivot_table(values='D', index=['A', 'B'], columns=['C'], aggfunc='mean')
print(pivot_table)
```

### 1.3 Group By and Aggregate
```python
# Group by and aggregation: Useful for performing operations like mean, sum, etc., on grouped data.
df = pd.DataFrame({
    'Category': ['A', 'B', 'A', 'B'],
    'Data': [10, 20, 30, 40]
})
grouped = df.groupby('Category').agg({'Data': ['mean', 'sum']})
print(grouped)
```

### 1.4 Merging and Joining
```python
# Merging dataframes: Useful for combining data from different sources based on a common key.
df1 = pd.DataFrame({'key': ['A', 'B', 'C'], 'value': [1, 2, 3]})
df2 = pd.DataFrame({'key': ['B', 'D'], 'value': [4, 5]})

merged = pd.merge(df1, df2, on='key', how='inner', suffixes=('_left', '_right'))
print(merged)
```

### 1.5 Window Functions
```python
# Rolling and Exponential Moving Window: Useful for calculating moving averages or sums.
df = pd.DataFrame({'Value': [10, 20, 30, 40, 50]})
df['Rolling_Sum'] = df['Value'].rolling(window=2).sum()
df['Exp_Moving_Avg'] = df['Value'].ewm(span=2).mean()
print(df)
```

## 2. Data Preprocessing with Scikit-Learn

### 2.1 StandardScaler
```python
from sklearn.preprocessing import StandardScaler

# StandardScaler: Used to standardize features by removing the mean and scaling to unit variance.
data = pd.DataFrame({
    'Feature1': [1, 2, 3, 4, 5],
    'Feature2': [10, 20, 30, 40, 50]
})

scaler = StandardScaler()
scaled_data = scaler.fit_transform(data)
scaled_df = pd.DataFrame(scaled_data, columns=['Feature1', 'Feature2'])
print(scaled_df)
```

### 2.2 Encoding Categorical Variables
```python
from sklearn.preprocessing import OneHotEncoder

# OneHotEncoder: Converts categorical variables into a format that can be provided to ML algorithms to do a better job in prediction.
df = pd.DataFrame({'Color': ['Red', 'Blue', 'Green']})
encoder = OneHotEncoder(sparse=False)
encoded = encoder.fit_transform(df[['Color']])
encoded_df = pd.DataFrame(encoded, columns=encoder.get_feature_names_out(['Color']))
print(encoded_df)
```

## 3. Building Models with Scikit-Learn

### 3.1 Linear Regression
```python
from sklearn.linear_model import LinearRegression
from sklearn.model_selection import train_test_split
import numpy as np

# Linear Regression: Used to predict continuous values, e.g., house prices.
X = np.array([[1, 1], [1, 2], [2, 2], [2, 3]])
y = np.dot(X, np.array([1, 2])) + 3

# Train-Test split: Splits the data into training and testing sets.
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Create a model and fit it: Fits the model to the training data.
model = LinearRegression()
model.fit(X_train, y_train)

# Predictions: Predicts the values for the test set.
predictions = model.predict(X_test)
print(predictions)
```

### 3.2 Logistic Regression
```python
from sklearn.linear_model import LogisticRegression

# Logistic Regression: Used for binary classification tasks, e.g., spam detection.
X = np.array([[1, 1], [2, 2], [3, 3], [4, 4]])
y = [0, 0, 1, 1]

# Create a model and fit it: Fits the model to the data.
model = LogisticRegression()
model.fit(X, y)

# Predictions: Predicts the classes for new data points.
predictions = model.predict([[2, 2], [3, 3]])
print(predictions)
```

### 3.3 Cross-Validation
```python
from sklearn.model_selection import cross_val_score

# Cross-Validation: Evaluates a model by splitting the data into multiple folds and checking accuracy.
model = LinearRegression()
scores = cross_val_score(model, X, y, cv=5)
print(f'Cross-Validation Scores: {scores}')
```

### 3.4 Hyperparameter Tuning with GridSearchCV
```python
from sklearn.model_selection import GridSearchCV

# GridSearchCV: Performs an exhaustive search over specified parameter values for an estimator.
param_grid = {'fit_intercept': [True, False], 'normalize': [True, False]}

# Create a GridSearchCV object: Finds the best model parameters.
grid_search = GridSearchCV(LinearRegression(), param_grid, cv=5)
grid_search.fit(X, y)

print(f'Best parameters: {grid_search.best_params_}')
```

### 3.5 Feature Importance with RandomForest
```python
from sklearn.ensemble import RandomForestClassifier

# Feature Importance: Determines which features contribute the most to predictions.
X = np.array([[1, 2], [3, 4], [5, 6], [7, 8]])
y = [0, 1, 0, 1]

model = RandomForestClassifier()
model.fit(X, y)

# Get feature importances: Higher values mean more important features.
importances = model.feature_importances_
print(f'Feature Importances: {importances}')
```

## 4. Model Evaluation Metrics

### 4.1 Classification Metrics
```python
from sklearn.metrics import classification_report, accuracy_score

# Accuracy and Classification Report: Used for evaluating classification models.
y_true = [0, 1, 1, 0, 1]
y_pred = [0, 1, 0, 0, 1]

# Accuracy: Proportion of correct predictions.
print(f'Accuracy: {accuracy_score(y_true, y_pred)}')

# Classification report: Provides precision, recall, and f1-score.
report = classification_report(y_true, y_pred)
print(report)
```

### 4.2 Regression Metrics
```python
from sklearn.metrics import mean_squared_error, r2_score

# Regression Metrics: Used to evaluate the performance of regression models.
y_true = [2.5, 0.0, 2, 8]
y_pred = [3, -0.5, 2, 7]

# Mean Squared Error: Measures the average of the squares of errors.
mse = mean_squared_error(y_true, y_pred)
print(f'Mean Squared Error: {mse}')

# R-squared: Indicates the proportion of variance explained by the model.
r2 = r2_score(y_true, y_pred)
print(f'R-squared: {r2}')
```

## 5. Pipelines for Model Building
```python
from sklearn.pipeline import Pipeline
from sklearn.preprocessing import StandardScaler
from sklearn.svm import SVC

# Pipelines: Streamlines the workflow for data preprocessing and model training.
pipeline = Pipeline([
    ('scaler', StandardScaler()),  # Step 1: Standardize features.
    ('svc', SVC())  # Step 2: Fit a Support Vector Classifier.
])

# Fit the model: Train the model on the data.
pipeline.fit(X, y)

# Predict: Make predictions on new data.
predictions = pipeline.predict(X)
print(predictions)
```
