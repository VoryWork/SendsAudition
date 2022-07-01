<template>
<div>
        <div class="sticky top-0 pt-10 grid grid-flow-row justify-center topbar-background">
            <img class="h-16 mx-auto sm:h-12 origin-center transform transition ease-in-out delay-300 rotate-30" src="/app-icon/activity.png" />
            <div class="font-sans text-xl antialiased text-center py-2 mb-3">{{tiku[current_question]['question']}}</div>
        </div>
        <div>
            <main class="container mx-auto">
                <div class="grid grid-flow-row flex max-w-sm mx-auto">
                    <div class="font-sans antialiased font-light text-igray-600 text-center pt-4 pb-2 sm:pt-2 sm:pb-1 sm:text-xs ">选项</div>
                    <div class="grid grid-cols-1 m-2" v-for="(item,index) in tiku[current_question]['option']">
                        <div class="quick-bar-item" @click="choose_answer(index)">
                            <img src="/app-icon/click.png" class="h-10 w-10 sm:h-8 sm:w-8" />
                            <div class="quick-bar-item-content">
                                <div class="text-base">{{item.text}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-16"></div>
            </main>
        <Footer-Menu actitem="test"></Footer-Menu>
    </div>
</div>
</template>

<script>
import tiku from '/test-tiku.json'
//引入题库
export default {
    data(){
        return{
            current_question:0,
            tiku:[]
            }
    },
    created() {
        this.tiku = tiku
        this.current_question = 0
    },
    methods: {
        test_axios() {
            this.$axios.$get('/').then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });

        },
        choose_answer(idx){
            switch (this.tiku[this.current_question]['option'][idx]['action']) {
                case "goto":
                    this.current_question =  this.tiku[this.current_question]['option'][idx]['target']
                    break;
                case "answer":
                    this.$router.push({
                        path: '/department',
                        query :{
                            dep:this.tiku[this.current_question]['option'][idx]['target']
                            }
                    })
                    break;
                default:
                    break;
            }
        }
    }
}
</script>
<style>
.shadow-2xl-center {
    --tw-shadow: 0 5px 16px 0px rgba(0, 0, 0, 0.1);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
        var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.topbar-background {
    background-color: #F8F8F8;
}

.rotate-30:hover {
    --tw-rotate: 30deg;
}

.quick-bar-item {
    @apply bg-gray-100 rounded-lg transition flex flex-grow auto-cols-auto items-center my-1 mx-2 pl-4 p-2 sm:p-1 sm:pl-2 sm:mx-1 justify-self-stretch;
}
.quick-bar-item-content {
    @apply mx-auto antialiased font-sans font-medium auto-rows-auto p-1 pl-4 sm:pl-2 flex-grow;
}
</style>
