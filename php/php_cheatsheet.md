## Variables
```
$variable_name = "value"; // Variable declaration
$number = 10; // Integer
$string = "Hello"; // String
$float = 10.5; // Float
$bool = true; // Boolean
```

## Data Types
```
- String
- Integer
- Float
- Boolean
- Array
- Object 
- NULL
```

## Arrays
### Indexed arrays
```

$fruits = array("Apple", "Banana, "Cherry");
$fruits = ["Apple", "Banana", "Cherry"];
```
### Associative arrays
```
$person = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];
```

## Create a table with php // Iterating through asssociative array
```
$id_names = array
(
	"Kis Bela" => "Ford",
	"Nagy Andras" => "Cadilac"
);

echo '<table border="1">';
echo '<tr><td>Nev</td><td>Auto</td></tr>';

foreach($id_names as $key => $name){
	echo '<tr>';
	echo '<td>'.$key.'</td>';
	echo '<td>'.$name.'</td>';
	echo '</tr>';
}

echo '/<table>';
```

## Foreach
```
foreach ($array as $value) {
    // Code to execute for each element
}
```

### Iterating through an array
```
$fruits = ['Apple', 'Banana', 'Cherry'];

foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}
```

## Control Structures
```
if($condition){
    // code to execute if condition is true
} elseif ($another_condition){
    
}
