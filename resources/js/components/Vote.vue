<template>
    <div id="vote_container" class="w-full bg-teal-200 p-40">
        <div id="gutter" class="w-full p-40 bg-white">
            <h1 class="text-center text-teal p-6">{{ title }}</h1>
            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Please chose your vote</h3>

            <form @submit.prevent="handleSubmit">
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input v-model="vote" id="horizontal-list-radio-license" type="radio" value="1" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vote 1 </label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input v-model="vote" id="horizontal-list-radio-id" type="radio" value="2" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="horizontal-list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vote 2</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input v-model="vote" id="horizontal-list-radio-millitary" type="radio" value="3" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="horizontal-list-radio-millitary" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vote 3</label>
                        </div>
                    </li>
                   
                    <li class="w-full dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input v-model="vote" id="horizontal-list-radio-passport" type="radio" value="4" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="horizontal-list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vote 4</label>
                        </div>
                    </li>
                </ul>
                
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded w-full">Submit your vote</button>
                
            </form>
        </div>
    </div>
    <p>{{vote}}</p>

    {{ hostData }}
</template>

<script>
    import {ref} from 'vue'

    const posts = ref([])
    const errorVar = ref(null)
    //const vote = 0
 
    const load = async () => {
        const requestOptions = {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ option_id: this.vote })
        };

        try{
            let data = await fetch('http://localhost:8000/', requestOptions)
            if (!data.ok)
                throw error('No Data Received')
            posts.value = await data.json()
        }
        catch(err)
        {
            errorVar.value = error.message
            console.log(errorVar.value)
        }
    }

    export default {
        //name: 'App',
        //props:['hostData'],
        data() {
            return {
                vote: 0,
                hostData: {}
            }
        },
        methods:
        {
            handleSubmit(){
                console.log('Vote submited: ' + this.vote)

                axios.post('http://localhost:8000/api/store',  Object.values(this.vote)) // {option_id: this.vote})
                .then( response => {
                    alert('success');
                    //for (i=0; i < response.length; i++)
                        //console.log(i);  
                        //sucess=true
                        console.log(response.data)             

                }, error => {
                    console.log('erro');
                    error = error.data//.message
                });
            }
        },
        components: {},
        setup: () => ({
            title: 'VOTING APP',
            load,
            posts,
            errorVar
        })
    }
    //return:
</script>

<style scoped>


</style>
