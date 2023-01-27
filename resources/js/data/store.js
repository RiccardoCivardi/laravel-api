import {reactive} from 'vue';

export const store = reactive({

    projects: [],
    pagination: {
        current: 1,
        last: null,
    }

});
