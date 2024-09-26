# Counter App in Flutter

This tutorial shows how to create a counter app in Flutter with increment and decrement buttons. Each step includes detailed comments.

```dart
// Importing the Flutter material package.
// This package contains essential components and widgets for building material design applications.
import 'package:flutter/material.dart';

// The main function serves as the entry point of the application.
// It calls `runApp()` to start the Flutter application.
void main() {
  runApp(MyApp());
}

// MyApp is a StatelessWidget, which means it cannot change its state during its lifetime.
// It serves as the root of the application and provides a structure for the app.
class MyApp extends StatelessWidget {
  // The build method describes how to display this widget in the UI.
  @override
  Widget build(BuildContext context) {
    // The MaterialApp widget is a top-level widget that provides necessary configurations
    // such as theme and routes for a material design application.
    return MaterialApp(
      // The `home` property specifies the default screen (or route) of the application.
      // Here, it is set to a custom StatefulWidget named `CounterApp`.
      home: CounterApp(),
    );
  }
}

// CounterApp is a StatefulWidget, meaning it can change its state during its lifetime.
// It manages the state for the counter value, increment, and decrement operations.
class CounterApp extends StatefulWidget {
  // This method creates the state for this widget.
  @override
  _CounterAppState createState() => _CounterAppState();
}

// _CounterAppState holds the state for the CounterApp widget.
// It contains the logic for incrementing and decrementing the counter.
class _CounterAppState extends State<CounterApp> {
  // _counter is a private variable that holds the current value of the counter.
  int _counter = 0;

  // This method increments the counter by 1.
  void _incrementCounter() {
    setState(() {
      _counter++; // Increases the counter by 1.
    });
  }

  // This method decrements the counter by 1.
  void _decrementCounter() {
    setState(() {
      if (_counter > 0) _counter--; // Decreases the counter by 1 if it's greater than 0.
    });
  }

  // The build method describes how to display this widget in the UI.
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      // The AppBar widget is used to create a top navigation bar.
      appBar: AppBar(
        // The title property sets the text that appears in the app bar.
        title: Text('Counter App'),
      ),
      // The body property of Scaffold represents the main content area of the screen.
      // It uses a Center widget to align its child widgets in the center of the available space.
      body: Center(
        // Column widget arranges its children vertically.
        child: Column(
          // Aligns the children in the center of the column.
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            // The Text widget displays a message describing the current counter value.
            Text(
              'Counter: $_counter',
              // The style property allows customization of the text appearance.
              style: TextStyle(
                fontSize: 24, // Sets the font size of the text to 24 pixels.
              ),
            ),
            // Row widget arranges its children horizontally.
            Row(
              // Aligns the row's children in the center.
              mainAxisAlignment: MainAxisAlignment.center,
              children: <Widget>[
                // IconButton widget is a button that displays an icon.
                // When pressed, it calls the _incrementCounter method.
                IconButton(
                  icon: Icon(Icons.add), // Adds a "+" icon to the button.
                  onPressed: _incrementCounter,
                ),
                // IconButton widget is a button that displays an icon.
                // When pressed, it calls the _decrementCounter method.
                IconButton(
                  icon: Icon(Icons.remove), // Adds a "-" icon to the button.
                  onPressed: _decrementCounter,
                ),
              ],
            ),
            // ElevatedButton widget creates a button that can be pressed.
            // When pressed, it resets the counter to 0.
            ElevatedButton(
              onPressed: () {
                setState(() {
                  _counter = 0; // Resets the counter to 0.
                });
              },
              child: Text('Reset'), // The text displayed on the button.
            ),
          ],
        ),
      ),
    );
  }
}
