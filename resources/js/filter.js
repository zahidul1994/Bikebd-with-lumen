import Vue from 'vue'
//for details short area start
Vue.filter('shortlength', function(text, length, suffix) {
    return text.substring(0, length) + suffix;
});

//for details short area end|