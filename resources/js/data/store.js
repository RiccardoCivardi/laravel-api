import {reactive} from 'vue';

export const store = reactive({

  baseUrl: 'http://127.0.0.1:8000/api/',
  projects: [],
  pagination: {
    current: 1,
    last: null, 
  }

});