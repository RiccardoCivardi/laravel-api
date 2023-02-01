import {reactive} from 'vue';

export const store = reactive({

    projects: [],
    types:[],
    thecnologies : [],

    pagination: {
        current: 1,
        last: null,
    },

    main_title: 'Elenco progetti',

    typeTechParam: '',

    searchParam: '',

    apiType : '',


});
