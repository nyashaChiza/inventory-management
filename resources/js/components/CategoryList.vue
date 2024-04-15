<template>
    <div>
      <h2>Categories</h2>
      <ul>
        <li v-for="category in categories" :key="category.id">
          {{ category.name }} - {{ category.description }}
        </li>
      </ul>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        categories: [],
      };
    },
    mounted() {
      this.fetchCategories();
    },
    methods: {
      fetchCategories() {
        // Fetch categories from Laravel backend API
        axios.get('/api/categories')
          .then(response => {
            this.categories = response.data;
          })
          .catch(error => {
            console.error('Error fetching categories:', error);
          });
      },
    },
  };
  </script>
