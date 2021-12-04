<template>  
    <div> 
	<div class="wrapper"> 
        <app-header  />
            <app-sidebar  />   
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
 
        components: { 
            'app-header': Header, 
            'Level': Level, 
            'app-sidebar': Sidebar, 
            'app-footer': Footer
        }
    }
</script>