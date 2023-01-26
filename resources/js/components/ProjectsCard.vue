<script>
export default {

  name:'ProjectsCard',

  props: {

    project: Object

  },

  data(){
    return{

      textMaxLength: 100

    }
  },

  methods: {

    truncateText(text) {
      if(text.length < this.textMaxLength) return text
      return text.substring(0,this.textMaxLength) + '...';
    }

  }

}
</script>

<template>

  <div class="card-wrapper">

    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Progetto: {{project.name}}</h5>
        <h5 v-if="project.type"><span class="badge text-bg-primary">{{project.type.name}}</span></h5>
        
        <div 
          v-if="project.technologies.length"
          class="technologies mb-2">
          <span 
            v-for="technology in project.technologies" :key="technology.id"
            class="badge text-bg-warning me-2 ">{{technology.name}}</span>
        </div>

        <h6 class="card-title">Cliente: {{project.client_name}}</h6>
        <div class="card-text" v-html="truncateText(project.summary)"></div>
      </div>
    </div>

  </div>
  
</template>

<style lang="scss" scoped>

.card-wrapper {
  padding: 10px 10px;
}

</style>