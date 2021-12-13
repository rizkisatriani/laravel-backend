<template>  
    <div> 
	<div  class="wrapper"> 
        <app-header v-if="isLogin" />
            <app-sidebar  v-if="isLogin"/>   
       <router-view></router-view>  
    </div>  
 </div> 
</template>
 
<script>
    import { mapState, mapGetters } from 'vuex'   
    import Sidebar from './inc/Sidebar.vue'  
    import Level from './settings/level.vue' 
    import Header from './inc/Header.vue'  
    import Footer from './inc/Footer.vue'   
    export default {
 
    data() {
        return {
            isLogin:false
        }},
        components: { 
            'app-header': Header, 
            'Level': Level, 
            'app-sidebar': Sidebar, 
            'app-footer': Footer
        }
        ,created() {
        if(!this.isLogin){
         this.isLogin=  localStorage.getItem("isLogin");
          if(!this.isLogin){ 
              setTimeout(()=>{ 
              this.$router.push('login')
                }, 500); 
          }else{
              
              this.$router.push('/')
          }
        }
        },updated() {
        if(!this.isLogin){
         this.isLogin=  localStorage.getItem("isLogin"); 
        }
        }
    }
</script>