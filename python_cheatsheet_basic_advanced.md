
# Python Cheatsheet (Basic + Advanced)

## Basics

### Variables and Data Types
```python
x = 5  # Integer
y = 3.14  # Float
s = "Hello"  # String
b = True  # Boolean
```

### Lists
```python
my_list = [1, 2, 3, 4]
my_list.append(5)  # Add item
my_list.remove(3)  # Remove item
```

### Tuples
```python
my_tuple = (1, 2, 3)
```

### Dictionaries
```python
my_dict = {'name': 'John', 'age': 25}
my_dict['name']  # Access value
```

### Sets
```python
my_set = {1, 2, 3}
my_set.add(4)  # Add an element
```

## Control Flow

### If-Else Statement
```python
if x > 0:
    print("Positive")
else:
    print("Non-positive")
```

### For Loop
```python
for i in range(5):
    print(i)
```

### While Loop
```python
while x > 0:
    print(x)
    x -= 1
```

## Functions

### Defining a Function
```python
def greet(name):
    return f"Hello, {name}"
```

### Lambda Functions
```python
add = lambda x, y: x + y
add(3, 5)  # Returns 8
```

### List Comprehensions
```python
squares = [x**2 for x in range(5)]
```

## Advanced Topics

### Decorators
```python
def my_decorator(func):
    def wrapper():
        print("Before function")
        func()
        print("After function")
    return wrapper

@my_decorator
def say_hello():
    print("Hello!")

say_hello()
```

### *args and **kwargs
```python
def func(*args, **kwargs):
    for arg in args:
        print(arg)
    for key, value in kwargs.items():
        print(f"{key}: {value}")

func(1, 2, 3, name='John', age=25)
```

### Inheritance (OOP)
```python
class Animal:
    def __init__(self, name):
        self.name = name

    def speak(self):
        return "Sound"

class Dog(Animal):
    def speak(self):
        return "Woof"

dog = Dog("Buddy")
print(dog.speak())  # Outputs: Woof
```

### Magic Methods (`__str__`, `__init__`, etc.)
```python
class Car:
    def __init__(self, model):
        self.model = model

    def __str__(self):
        return f"Car model: {self.model}"

car = Car("Toyota")
print(car)  # Outputs: Car model: Toyota
```

### Generators
```python
def my_generator():
    for i in range(5):
        yield i

gen = my_generator()
for value in gen:
    print(value)
```

### Exception Handling
```python
try:
    result = 10 / 0
except ZeroDivisionError:
    print("Division by zero!")
finally:
    print("Cleanup code")
```

### Context Managers (`with` statement)
```python
with open('file.txt', 'r') as file:
    content = file.read()
```

### Modules and Imports
```python
import math
print(math.sqrt(16))  # Outputs: 4.0

from math import sqrt
print(sqrt(25))  # Outputs: 5.0
```

## Functional Programming

### `map`, `filter`, `reduce`
```python
nums = [1, 2, 3, 4]

# map
squared = list(map(lambda x: x**2, nums))

# filter
evens = list(filter(lambda x: x % 2 == 0, nums))

# reduce
from functools import reduce
sum_all = reduce(lambda x, y: x + y, nums)
```

## File Handling

### Reading and Writing Files
```python
# Reading a file
with open('file.txt', 'r') as file:
    content = file.read()

# Writing to a file
with open('file.txt', 'w') as file:
    file.write("Hello, World!")
```

## Regular Expressions
```python
import re
pattern = r"\d+"
text = "There are 123 apples"

match = re.search(pattern, text)
if match:
    print(match.group())  # Outputs: 123
```

## Working with JSON
```python
import json

data = {"name": "John", "age": 30}

# Convert to JSON
json_data = json.dumps(data)

# Parse JSON
parsed_data = json.loads(json_data)
```

## List/Dict Set Operations

### Set Operations
```python
a = {1, 2, 3}
b = {3, 4, 5}

a.intersection(b)  # {3}
a.union(b)  # {1, 2, 3, 4, 5}
a.difference(b)  # {1, 2}
```

### Dictionary Comprehensions
```python
squares = {x: x**2 for x in range(5)}
```

---

This Python Cheatsheet covers both basic and advanced topics, including decorators, *args, **kwargs, list comprehensions, and more.
