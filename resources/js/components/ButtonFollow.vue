<template>
    <div>
        <button class="btn btn-primary ml-4 btn-md pt-1" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props : ['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data : function(){
            return {
                status : this.follows
            }
        },
        methods : {
            followUser(){
                axios.post(`/follow/${this.userId}`)
                     .then(res => {
                         this.status = !this.status 
                        })
                     .catch(errors => {
                         console.log(errors)
                         if(errors.response.status == 401 || errors.response.status == 500){
                                window.location = '/login' 
                            }
                        })
            }
        },
        computed : { 
            buttonText(){
                return this.status ? 'Unfollow' : 'Follow'
            }
        }
 
    }
</script>
