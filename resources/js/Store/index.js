import axios from "axios"
import createPersistedState from "vuex-persistedstate";
export default {
    state: {
        accounttype: [], //for Accounttype
        gender: [], //for gender
        status: [], //for status
        addadmin: [], //for admin
        adduserprofile: [], //for adminprofile
        adminprofile: [], //for adminprofile
        division: [], //for Location Division
        subdivision: [], //for Location SubDivision
        category: [], //for Category 
        bikemodel: [], //for Bike Model 
        modelyear: [], //for Bike Model Year
        bikeversion: [], //for bikeVersion
        bikebrand: [], //for bikeBrand


        alluserlist: [], // for userlist
        alluserbikepostlist: [], // for user Bikepost
        bodytype: [], //for bodytype
        allaccnewbikelist: [], //for accnew bike list
        userbikepostlistcheck: [], //Admin Check User Bike post
        usercarpostlistcheck: [], //Admin Check User Car post
        useraccessoriespostlistcheck: [], //Admin Check User Accessories post
        allbikepostlist: [], // Bike post
        adminmanager: [], // Admin Manager post
        blogpost: [], // for blog post
        usercreateshow: [], // Admin user create
        admincreateshow: [], // Admin user create
        blogpage: [] // for blog Page


    },
    getters: {
        getAccounttype(state) {
            return state.accounttype
        },

        getGender(state) {
            return state.gender //for gender
        },
        getStatus(state) {
            return state.status //for gender
        },
        getAdmin(state) {
            return state.addadmin //for admin
        },
        getUserProfile(state) {
            return state.adduserprofile //for user profile
        },
        getAdminProfile(state) {
            return state.adminprofile //for show adminprofile
        },
        getDivision(state) {
            return state.division //for show division 
        },
        getSubDivision(state) {
            return state.subdivision //for show Subdivision 
        },
        getCategory(state) {
            return state.category //for show Category 
        },

        getBikeModel(state) {
            return state.bikemodel //for show Bike Model 
        },
        getModelYear(state) {
            return state.modelyear //for show Bike Model  year
        },
        getBikeVersion(state) {
            return state.bikeversion //for show bikeVersion 
        },

        getBikeBrand(state) {
            return state.bikebrand //for show bikeBrand 
        },

        getAllUserList(state) {
            return state.alluserlist //for show All userlist 
        },
        getUserBikePostList(state) {
            return state.alluserbikepostlist //for show user bikepost list 
        },



        getBodytype(state) {
            return state.bodytype //for show bodytype 
        },



        getAccbikePostlist(state) {
            return state.allaccnewbikelist //for show accnewbike list 
        },
        getBikePostListcheck(state) {
            return state.userbikepostlistcheck //for show  bikepost for active inactive list 
        },


        getAllBikePost(state) {
            return state.allbikepostlist //for bikepost
        },
        getAdminmanager(state) {
            return state.adminmanager //for adminmanager post
        },
        getBlogpost(state) {
            return state.blogpost //for BlogPost post
        },
        getUaesrcreate(state) {
            return state.usercreateshow //for adminmanager post
        },
        getAdminrcreate(state) {
            return state.admincreateshow //for adminmanager post
        },
        getAdminblogpage(state) {
            return state.blogpage //for Admin Blogpage 
        },
    },


    actions: {
        allAccounttype(context) {
            axios.get('/superadmin/accounttypelist')
                .then((response) => {
                    context.commit('accounttype', response.data.accounttype) //for accounttype
                })
        },
        allGender(context) {
            axios.get('/superadmin/genderlist')
                .then((response) => {
                    console.log(response.data);
                    context.commit('gender', response.data.gender) //for gender
                })

        },
        allStatus(context) {
            axios.get('/superadmin/statuslist')
                .then((response) => {
                    console.log(response.data);
                    context.commit('status', response.data.status) //for status
                })

        },
        allAdmin(context) {
            axios.get('/superadmin/teammemberlist')
                .then((response) => {
                    context.commit('addadmin', response.data.teammemberlist) //for admin
                })
        },
        userprofile(context) {
            axios.get('/en/myprofile')
                .then((respone) => {
                    context.commit('adduserprofile', respone.data.userinfo) // for user Profile
                })
        },
        adminprofile(context) {
            axios.get('/admin/adminprofile')
                .then((respone) => {
                    context.commit('adminprofile', respone.data.adminprofile) // for Admin Profile
                })
        },
        allDivision(context) {
            axios.get('/admin/divisionlist')
                .then((respone) => {
                    context.commit('division', respone.data.division) // for Admin Division
                })
        },
        allSubDivision(context) {
            axios.get('/admin/subdivisionlist')
                .then((respone) => {
                    context.commit('subdivision', respone.data.subdivision) // for Admin Sub-Division
                })
        },
        allCategory(context) {
            axios.get('/admin/categorylist')
                .then((respone) => {
                    context.commit('category', respone.data.category) // for Admin Category
                })
        },

        allBikeModel(context) {
            axios.get('/admin/bikemodellist')
                .then((respone) => {
                    context.commit('bikemodel', respone.data.bikemodel) // for Admin Bike model
                })
        },
        allModelYear(context) {
            axios.get('/admin/modelyearlist')
                .then((respone) => {
                    context.commit('modelyear', respone.data.modelyear) // for Admin Bike model Year
                })
        },
        allBikeVersion(context) {
            axios.get('/admin/bikeversionlist')
                .then((respone) => {
                    context.commit('bikeversion', respone.data.bikeversion) // for Admin bikeVersion
                })
        },

        allBikebrand(context) {
            axios.get('/admin/bikebrandlist')
                .then((respone) => {
                    context.commit('bikebrand', respone.data.bikebrand) // for Admin bikeBrand
                })
        },


        allUserlist(context) {
            axios.get('/admin/alluseraccountlist')
                .then((respone) => {
                    context.commit('alluserlist', respone.data.alluserlist) // for Admin bikeBrand
                })
        },
        allUserBikePostlist(context) {
            axios.get('/en/bikepostlist')
                .then((respone) => {
                    context.commit('alluserbikepostlist', respone.data.bikepostlist) // for user bike post view
                })
        },

        allBodytype(context) {
            axios.get('/admin/bodytypelist')
                .then((respone) => {
                    context.commit('bodytype', respone.data.bodytype) // for Admin bikeBrand
                })
        },


        allAccbikepostlist(context) {
            axios.get('/en/accbikenew')
                .then((respone) => {
                    context.commit('allaccnewbikelist', respone.data.accessorieslist) // for Admin bikeBrand
                })
        },
        allBikePostlistcheck(context) {
            axios.get('/admin/userbikepostlist')
                .then((respone) => {
                    context.commit('userbikepostlistcheck', respone.data.biketlist) // for user bike post active inactive
                })
        },
        allCarPostlistcheck(context) {
            axios.get('/admin/usercarpostlist')
                .then((respone) => {
                    context.commit('usercarpostlistcheck', respone.data.carlist) // for user car post active inactive
                })
        },


        allBikePost(context) {
            axios.get('/en/bikepost')
                .then((respone) => {
                    context.commit('allbikepostlist', respone.data.allbikepost) // bike post 
                })
        },


        allAdminmanagerlist(context) {
            axios.get('/admin/adminmanager')
                .then((respone) => {
                    context.commit('adminmanager', respone.data.userlist) // for Admin manager Car post active inactive
                })
        },
        allBlogpostlist(context, page = 1) {

            axios.get("blogpost?page=" + page)
                .then((respone) => {
                    context.commit('blogpost', respone.data) // for blog post view
                })
        },
        allUsercreatelist(context) {
            axios.get('/admin/userlist')
                .then((respone) => {
                    context.commit('usercreateshow', respone.data.teammemberlist) // for Admin manager Car post active inactive
                })
        },
        allAdmincreatelist(context) {
            axios.get('/admin/adminlist')
                .then((respone) => {
                    context.commit('admincreateshow', respone.data.adminteammemberlist) // for Admin manager Car post active inactive
                })
        },
        allBlogpagelist(context, page = 1) {
            axios.get('/admin/blogpage?page=' + page)
                .then((respone) => {
                    context.commit('blogpage', respone.data.blogpage) // for Admin blog page show
                })
        },

    },
    mutations: {
        accounttype(state, data) {
            return state.accounttype = data; //for accounttype
        },
        gender(state, data) {
            return state.gender = data //for gender
        },
        status(state, data) {
            return state.status = data //for status
        },
        addadmin(state, data) {
            return state.addadmin = data //for admin
        },
        adduserprofile(state, data) {
            return state.adduserprofile = data //for userinfo
        },
        adminprofile(state, data) {
            return state.adminprofile = data //for userinfo
        },
        division(state, data) {
            return state.division = data //for userinfo
        },
        subdivision(state, data) {
            return state.subdivision = data //for Subdivision
        },
        category(state, data) {
            return state.category = data //for category
        },

        bikemodel(state, data) {
            return state.bikemodel = data //for Bike Model
        },
        modelyear(state, data) {
            return state.modelyear = data //for Bike Model Year
        },
        bikeversion(state, data) {
            return state.bikeversion = data //for bike version
        },
        bikebrand(state, data) {
            return state.bikebrand = data //for bike brand
        },

        alluserlist(state, data) {
            return state.alluserlist = data //for bike brand
        },
        alluserbikepostlist(state, data) {
            return state.alluserbikepostlist = data //for bike brand
        },

        bodytype(state, data) {
            return state.bodytype = data //for bike brand
        },


        allaccnewbikelist(state, data) {
            return state.allaccnewbikelist = data //for car 
        },
        usercarpostlistcheck(state, data) {
            return state.usercarpostlistcheck = data //for bike Car list active inactive
        },

        userbikepostlistcheck(state, data) {
            return state.userbikepostlistcheck = data //for bike post list active inactive
        },
        usercarpostlistcheck(state, data) {
            return state.usercarpostlistcheck = data //for bike post list active inactive
        },



        allbikepostlist(state, data) {
            return state.allbikepostlist = data //for bike post 
        },

        adminmanager(state, data) {
            return state.adminmanager = data //for admin manager post 
        },
        blogpost(state, data) {
            return state.blogpost = data //for blog post 
        },
        usercreateshow(state, data) {
            return state.usercreateshow = data //for admin user create post 
        },
        admincreateshow(state, data) {
            return state.admincreateshow = data //for admin user create post 
        },
        blogpage(state, data) {
            return state.blogpage = data //for admin blog page show 
        },

    },
    plugins: [createPersistedState()] //for save refresh template value
}