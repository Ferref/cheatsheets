
# Vue.js 3 Cheatsheet

## Introduction
Vue.js is a progressive JavaScript framework for building user interfaces, designed to be incrementally adaptable. It is primarily used for building single-page applications (SPAs) and offers a simple yet powerful API for working with reactivity and components.

## Setting Up a Vue Application
1. **Using Vue CLI:**
    ```bash
    npm install -g @vue/cli # Install Vue CLI globally
    vue create my-app       # Create a new Vue project
    cd my-app               # Navigate into the project directory
    npm run serve           # Run the development server
    ```

2. **Using Vue 3 with CDN:**
    ```html
    <!-- Add Vue.js via CDN -->
    <script src="https://unpkg.com/vue@next"></script>
    ```

## Vue Instance
- The Vue instance is the core of any Vue application.
    ```js
    const app = Vue.createApp({
      data() {
        return {
          message: 'Hello, Vue 3!'
        };
      }
    }).mount('#app'); // Mounts the app to the #app element
    ```

## Templates and Data Binding
1. **Interpolation:**
    ```html
    <div>{{ message }}</div> <!-- Renders the message from data -->
    ```

2. **Directives:**
    - `v-bind`: Dynamically binds attributes.
        ```html
        <a v-bind:href="url">Link</a> <!-- Binds the href attribute to 'url' -->
        ```
    - `v-model`: Creates two-way data binding on form inputs.
        ```html
        <input v-model="inputValue" /> <!-- Binds the input value to data property 'inputValue' -->
        ```

    - `v-for`: Renders a list of items.
        ```html
        <ul>
          <li v-for="item in items" :key="item.id">{{ item.text }}</li> <!-- Renders each item in the list -->
        </ul>
        ```

    - `v-if`, `v-else`: Conditionally renders elements.
        ```html
        <p v-if="isVisible">Visible Text</p>
        <p v-else>Hidden Text</p> <!-- Displays based on 'isVisible' boolean -->
        ```

## Components
1. **Defining a Component:**
    ```js
    app.component('my-component', {
      template: '<div>A custom component!</div>'
    });
    ```
2. **Using the Component:**
    ```html
    <my-component></my-component> <!-- Custom component rendered here -->
    ```

3. **Passing Props:**
    ```js
    app.component('child-component', {
      props: ['title'],
      template: '<h1>{{ title }}</h1>'
    });
    ```
    ```html
    <child-component title="Hello, World!"></child-component> <!-- Pass 'Hello, World!' as a prop -->
    ```

4. **Emitting Events:**
    ```js
    app.component('button-counter', {
      data() {
        return { count: 0 };
      },
      template: '<button @click="count++">Clicked {{ count }} times</button>'
    });
    ```

## Lifecycle Hooks
- These hooks allow you to run code at specific stages of the component’s life.
    ```js
    app.component('example-component', {
      created() {
        console.log('Component created');
      },
      mounted() {
        console.log('Component mounted');
      }
    });
    ```

## Computed Properties and Watchers
1. **Computed Properties:**
    ```js
    const app = Vue.createApp({
      data() {
        return { message: 'Hello Vue!' };
      },
      computed: {
        reversedMessage() {
          return this.message.split('').reverse().join('');
        }
      }
    }).mount('#app'); // 'reversedMessage' returns the message reversed
    ```

2. **Watchers:**
    - Reactively respond to changes in data.
    ```js
    watch: {
      message(newVal, oldVal) {
        console.log(`Message changed from ${oldVal} to ${newVal}`);
      }
    }
    ```

## Vue Router
1. **Installation:**
    ```bash
    npm install vue-router
    ```

2. **Setting Up Routes:**
    ```js
    const routes = [
      { path: '/home', component: Home },
      { path: '/about', component: About }
    ];
    const router = VueRouter.createRouter({
      history: VueRouter.createWebHistory(),
      routes
    });
    const app = Vue.createApp({});
    app.use(router);
    app.mount('#app');
    ```

## Vuex (State Management)
1. **Installation:**
    ```bash
    npm install vuex
    ```

2. **Setting Up the Store:**
    ```js
    const store = Vuex.createStore({
      state() {
        return {
          count: 0
        };
      },
      mutations: {
        increment(state) {
          state.count++;
        }
      }
    });
    ```

3. **Using the Store:**
    ```js
    const app = Vue.createApp({});
    app.use(store);
    app.mount('#app');
    ```

4. **Accessing Store Data:**
    ```html
    <p>{{ $store.state.count }}</p> <!-- Access 'count' from store state -->
    ```

5. **Committing Mutations:**
    ```html
    <button @click="$store.commit('increment')">Increment</button> <!-- Calls the 'increment' mutation -->
    ```

## Handling Forms
1. **Two-Way Binding with v-model:**
    ```html
    <input v-model="formInput" /> <!-- Binds formInput to input value -->
    <p>{{ formInput }}</p> <!-- Displays current input value -->
    ```

## API Integration with Axios
1. **Installation:**
    ```bash
    npm install axios
    ```

2. **Making a GET Request:**
    ```js
    axios.get('https://api.example.com/data')
      .then(response => {
        this.info = response.data; // Store API response in 'info' data property
      });
    ```

## Custom Directives
- Directives extend the functionality of HTML elements.
    ```js
    app.directive('focus', {
      mounted(el) {
        el.focus(); // Automatically focus the element when mounted
      }
    });
    ```

## Mixins
- Reusable chunks of functionality.
    ```js
    const myMixin = {
      created() {
        console.log('Mixin Hook Called');
      }
    };

    const app = Vue.createApp({
      mixins: [myMixin]
    }).mount('#app');
    ```

## Transitions and Animations
1. **Basic Transition:**
    ```html
    <transition name="fade">
      <p v-if="show">Hello Vue!</p>
    </transition>
    ```

2. **CSS for Transition:**
    ```css
    .fade-enter-active, .fade-leave-active {
      transition: opacity 0.5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
      opacity: 0;
    }
    ```

## Conclusion
This cheatsheet covers essential Vue.js concepts and code snippets to get started. For more details and complete examples, refer to the [GitHub Repository](https://github.com/Ferref/Intro-to-Vue-3).
