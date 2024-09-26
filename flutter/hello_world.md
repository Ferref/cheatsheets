# Hello World App in Flutter

This tutorial demonstrates how to create a simple "Hello World" app in Flutter with detailed comments.

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
// It only describes how the UI should look based on the current configuration and information.
class MyApp extends StatelessWidget {
  // The build method is called whenever this widget is rendered.
  // It returns a widget that describes part of the user interface.
  @override
  Widget build(BuildContext context) {
    // The MaterialApp widget is a top-level widget that provides necessary configurations
    // such as theme and routes for a material design application.
    return MaterialApp(
      // The `home` property specifies the default screen (or route) of the application.
      // Here, it is set to a Scaffold widget, which provides the basic visual layout structure.
      home: Scaffold(
        // The AppBar widget is used to create a top navigation bar.
        appBar: AppBar(
          // The title property sets the text that appears in the app bar.
          title: Text('Hello World App'),
        ),
        // The body property of Scaffold represents the main content area of the screen.
        // It uses a Center widget to align its child in the center of the available space.
        body: Center(
          // The Text widget displays a piece of text with optional styling.
          child: Text(
            // This is the actual text displayed by the Text widget.
            'Hello, World!',
            // The style property allows customization of the text appearance.
            style: TextStyle(
              // Sets the font size of the text to 24 pixels.
              fontSize: 24,
            ),
          ),
        ),
      ),
    );
  }
}
