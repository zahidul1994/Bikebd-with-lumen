<template>
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Blog List </h3>
            <div class="text-right">
                <div class="btn btn-outline-info ">
                    <router-link to="/admin/createblogpost">Create Blog</router-link>
                </div>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">

            <form role="form" class="form-inline">
                <div class="input-group-btn">
                    <input type="text" @keyup="RealSearch" v-model="keyword" class="form-control inline"
                        placeholder="Search">
                    <button type="submit" @click.prevent="RealSearch" class="btn btn-info "><i class="fa fa-search"></i>
                    </button>
                </div>
            </form>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Date Time</th>
                        <th>Title</th>
                        <th>Image</th>

                        <th>Category</th>
                        <!-- <th>Description</th> -->
                        <th>Status </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="bloginfo in allBlogpostlist.data" :key="bloginfo.id">

                        <td style="width:116px">{{bloginfo.created_at}}</td>
                        <td>{{bloginfo.title}}</td>

                        <td><img :src="'/images/blogpost/'+ bloginfo.postimage" alt="no image" width=50
                                data-lightbox="image-1"></td>

                        <td @click.prevent="CategoryChange(bloginfo.id)" data-toggle="modal"
                            data-target="#showctegoryModal" title="Click for Change Category"><span class="btn"  v-for="catelist in  bloginfo.blogcategorylist"
                                :key="(catelist.id)">{{catelist.categorylist}} <br></span></td>

                        <!-- <td>  <span v-html="bloginfo.description"></span></td> -->
                        <td>
                            <span class="btn btn-sm btn-primary" @click.prevent="activestatus(bloginfo.id)"
                                v-if="bloginfo.status==1"><i class="fas fa-check-square"></i> </span>
                            <span class="btn btn-sm btn-danger" @click.prevent="inactivestatus(bloginfo.id)" v-else><i
                                    class="fas fa-ban"></i></span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm">Action</button>
                                <button type="button"
                                    class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon btn-sm"
                                    data-toggle="dropdown">
                                    <div class="dropdown-menu pull-right" role="menu">
                                        <router-link class="dropdown-item"  :to="`/admin/editblogpost/${bloginfo.id}`">
                                            <i class="fas fa-edit"> Edit</i>
                                        </router-link>
                                        <a v-if="bloginfo.language=='en'">
                                            <router-link class="dropdown-item" :to="`/blog/${bloginfo.slug}`">
                                                <i class="fas fa-info"> Details</i>
                                            </router-link>
                                        </a>
                                        <a v-else>
                                            <router-link class="dropdown-item" target='_blank'
                                                :to="`/bn/blog/${encodeURI(bloginfo.slug)}`">
                                                <i class="fas fa-info"> Details</i>
                                            </router-link>
                                        </a>
                                        <button class="dropdown-item btn btn-sm btn-info"
                                            @click.prevent="UpdateUrl(bloginfo.id)"  data-toggle="modal"
                            data-target="#showUrlmodal"><i class="fas fa-trash-alt"></i>
                                            Upndate Url</button>
                                            
                                            
                                            <button class="dropdown-item btn btn-sm btn-warning"
                                            @click.prevent="deleteBlog(bloginfo.id)"><i class="fas fa-trash-alt"></i>
                                            Delete</button>

                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </button>
                            </div>

                        </td>
                    </tr>

                </tbody>
            </table>

            <!-- /.card-body -->
            <div class="card-footer">
                <pagination :data="allBlogpostlist" @pagination-change-page="getResults" style="text-align:center">
                </pagination>
            </div>
        </div>


        <!--create Modal-->
        <div class="modal fade" id="showctegoryModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Category List</h4>
                        <button type="button" @click="FormReset()" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <span v-for="category in blogcategorylist">

                            <h3>{{category.categorylist}}
                                <span class="btn btn-danger" @click="deleteCategory(category.id)">
                                    x
                                </span>

                            </h3>
                        </span>



                        <form @submit.prevent="addNewCategory">
                            <div class="form-group">
                                <label for="category">Category *</label>
                                <v-select multiple v-model="form.category" :options="categoryVal" label=categoryname
                                    :reduce="categoryname=>categoryname.categoryname" id="category"
                                    :class="{'is-invalid' :form.errors.has('category')}" />
                                <div class="col-sm-10">

                                    <has-error :form="form" field="category"></has-error>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add New</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
   <!--category Modal end-->


    <!--Url Modal-->
        <div class="modal fade" id="showUrlmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Url  Add</h4>
                        <button type="button" @click="FormReset()" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                       <form @submit.prevent="CreateOrUpdateUrl">
                             <div class="form-group">
                    <label for="url" v-if="form.language=='en'">বাংলা (Slug)</label>
                    <label for="url" v-else="">English (Slug)</label>
                     <input  v-model="urlform.url" type="text"  class="form-control"  :class="{ 'is-invalid': form.errors.has('url') }"  id="url" >
                        <has-error :form="urlform" field="url"></has-error>
                  </div>
                            <button type="submit" class="btn btn-primary">Add Or Update</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
   <!--Url Modal end-->

    </div>

</template>

<script>
    export default {
        name: "BlogPostList",
        data() {
            return {
                form: new Form({
                    id: '',
                    category: [],
                }),
                 urlform: new Form({
                    id: '',
                    url:'',
                }),
                // Our data object that holds the Laravel paginator data
                allBlogpostlist: {},
                keyword: '',
                blogcategorylist: [],
                categoryVal: [],
            };
        },
        created() {
            document.title = "Blog List ";
        },
        mounted() {
            // this.$store.dispatch("allBlogpostlist"); //for show Accessories
            this.getResults();
            axios.get('category')
                .then(response => {
                    this.categoryVal = response.data.category;
                });

        },

        methods: {
            getResults(page = 1) {
                axios.get("/admin/blogpost?page=" + page).then(response => {
                    this.allBlogpostlist = response.data;
                });
            },
            //for search
            RealSearch: _.debounce(function () {
                //alert(5);
                axios.get("/admin/bloginsearch?s=" + encodeURI(this.keyword)).then(response => {
                    this.allBlogpostlist = response.data;
                });

            }, 1000),

            deleteBlog(id) {
                if (confirm("Do you really want to delete it?")) {

                    axios.delete("/admin/deleteblogpost/" + id)
                        .then(({
                            response = true
                        }) => {
                            [toastr.warning("Post Delete Successfully", " BlogPost")];

                        });
                };
                axios.get("/admin/blogpost?page=" + this.allBlogpostlist.current_page).then(response => {
                        this.allBlogpostlist = response.data;
                    })
                    .catch(function (response = false) {
                        //console.log(response);
                        toastr.error("Sorry Try Agin");
                    }); //for show Division
            },

            activestatus(id) {
                axios.post("/admin/blogpostinactive/" + id)
                    .then(({
                        response = true
                    }) => {
                        [toastr.info("Blog Post  Private Successfully", "Blogpost")];
                    });

                axios.get("/admin/blogpost?page=" + this.allBlogpostlist.current_page).then(response => {
                        this.allBlogpostlist = response.data;
                    })
                    .catch(function (response = false) {
                       // console.log(response);
                        toastr.error("Sorry Try Agin");
                    }); //for inactive account
                // alert('Hello');
            },
            inactivestatus(id) {
                //alert(5);
                axios
                    .post("/admin/blogpostactive/" + id)
                    .then(({
                        response = true
                    }) => {
                        [toastr.success("Blog Post  Public Successfully", "Blogpost")];
                    });

                axios.get("/admin/blogpost?page=" + this.allBlogpostlist.current_page).then(response => {
                        this.allBlogpostlist = response.data;
                    })
                    .catch(function (response = false) {
                        //console.log(response);
                        toastr.error("Sorry Try Agin");
                    }); //for active Account
                // alert('Hello');
            },

            CategoryChange(id) {
                this.form.id = id;
                axios.post("/admin/blogcategory/" + id)
                    .then(response => {
                        this.blogcategorylist = response.data.blogcate;
                    })
            },
            deleteCategory(id) {
                if (confirm("Do you really want to delete it?")) {
                    axios.delete('/admin/deleteblogcategory/' + id)
                        .then(response => {
                            toastr.warning("Category Delete Successfully", " Category");
                            this.blogcategorylist = response.data.blogcate;

                        });
                }

            },
            addNewCategory() {
                this.form.post("/admin/createblogcategory")
                    .then(response => {
                        toastr.success("New Category add Successfully", " Category");
                          $('#showctegoryModal').modal('toggle');
                             this.FormReset(); 
                    })
            },

            UpdateUrl(id){
              axios.get(`admin/editblogpost/${id}`)
          .then((response)=>{
              this.urlform.fill(response.data.blogpost);
              $('#showUrlmodal').modal('toggle');
          }); 
            },
          CreateOrUpdateUrl(){
                  this.urlform.post("/admin/updatebnenurl")
                    .then(response => {
                        toastr.success("Url Update Successfully", " Blog");
                        $('#showUrlmodal').modal('toggle');
                      axios.get("/admin/blogpost?page=" + this.allBlogpostlist.current_page).then(response => {
                    this.allBlogpostlist = response.data;
                });
                    })
          },

            FormReset() { //for restore form
                this.form.reset();
                 this.urlform.reset();
                axios.get("/admin/blogpost?page=" + this.allBlogpostlist.current_page).then(response => {
                    this.allBlogpostlist = response.data;
                });
            }
        },
    };
</script>