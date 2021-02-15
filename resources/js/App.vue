<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <a href="https://www.wribeiiro.com/" target="_blank"><img src="https://warlord0blog.files.wordpress.com/2018/03/vue-laravel.png?w=155"></a><br>
            <span class="text-white">Laravue Books</span>
        </div>

        <transition name="fade">
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>
    export default {}
</script>
