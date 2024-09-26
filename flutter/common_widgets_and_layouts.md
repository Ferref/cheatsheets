# Common Widgets and Layouts in Flutter

This guide covers some of the most commonly used widgets and layouts in Flutter, explained in a single section with detailed comments.

```dart
// The Text widget is used to display a string of text with optional styling.
Text(
  'Hello, Flutter!', // The text displayed by the widget.
  // The style property allows customization of the text appearance.
  style: TextStyle(
    fontSize: 24, // Sets the font size of the text to 24 pixels.
    fontWeight: FontWeight.bold, // Sets the font weight to bold.
    color: Colors.blue, // Sets the color of the text to blue.
  ),
);

// The Container widget is used to contain other widgets and provide padding, margins, borders, and backgrounds.
Container(
  padding: EdgeInsets.all(16.0), // Adds 16 pixels of padding on all sides.
  color: Colors.blue, // Sets the background color of the container to blue.
  child: Text(
    'This is a Container widget!', // The text displayed inside the container.
    style: TextStyle(
      fontSize: 18, // Sets the font size of the text to 18 pixels.
      color: Colors.white, // Sets the color of the text to white.
    ),
  ),
);

// The Row widget arranges its children horizontally in a single line.
Row(
  mainAxisAlignment: MainAxisAlignment.center, // Centers the children horizontally.
  children: <Widget>[
    Icon(Icons.star), // Displays a star icon.
    SizedBox(width: 10), // Adds a horizontal space of 10 pixels.
    Text('Star'), // Displays the text 'Star'.
  ],
);

// The Column widget arranges its children vertically in a single line.
Column(
  mainAxisAlignment: MainAxisAlignment.center, // Centers the children vertically.
  children: <Widget>[
    Icon(Icons.star), // Displays a star icon.
    SizedBox(height: 10), // Adds a vertical space of 10 pixels.
    Text('Star'), // Displays the text 'Star'.
  ],
);

// The ListView widget is used to create a scrollable list of items.
ListView(
  children: <Widget>[
    // ListTile widgets are commonly used to display individual items in a list.
    ListTile(
      leading: Icon(Icons.map), // A leading icon displayed before the title.
      title: Text('Map'), // The title text displayed for this item.
    ),
    ListTile(
      leading: Icon(Icons.photo), // A leading icon displayed before the title.
      title: Text('Photos'), // The title text displayed for this item.
    ),
    ListTile(
      leading: Icon(Icons.phone), // A leading icon displayed before the title.
      title: Text('Phone'), // The title text displayed for this item.
    ),
  ],
);
