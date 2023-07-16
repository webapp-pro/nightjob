<template>
    <div class="job-component">
        <div v-for="(post, index) in posts" :key="index">
            <div class="col-sm-6 col-md-6 col-lg-4 col-sm-6 mb-sm-3" v-if="post.company">
                <div class="cursor" @click="handleRedirectTo(post.id)">
                    <div class="job-item border row h-100">
                        <div class="col-xs-3 col-sm-4 col-md-5">
                            <img :src="post.company.logo" alt="" class="img-fluid p-2">
                        </div>
                        <div class="job-description col-xs-9 col-sm-8 col-md-7">
                            <p class="company-name" :title="post.company.title">{{ post.company.title }}</p>
                                <ul class="company-listings">
                                <li>•{{ post.spcategorycustom_jp.substr(0, 27) }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import Sidebar from "./Sidebar";
// import SearchResult from "./SearchResult";

export default {
    name: "job-component",
    components: {},
    data() {
        return {
            posts: [],
        };
    },
    created() {
        this.getJobs();
    },
    methods: {
        getJobs() {
            this.$Progress.start();
            const query = this.getParameterByName("q", window.location.href);
            if (query !== "" && query !== null) {
                axios
                    .get("/api/search/?q=" + query)
                    .then((res) => res.data)
                    .then((data) => {
                        this.posts = data;
                        this.$Progress.finish();
                    })
                    .catch((err) => {
                        console.log(err.message);
                        this.$Progress.fail();
                    });
            }
        },
        getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return "";
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        },
        handleRedirectTo(id) {
            window.location.href=`job/${id}`;
        }
    },
};
</script>

<style lang="scss" scoped></style>
