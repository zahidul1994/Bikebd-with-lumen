<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateCategory">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="division">Category</label>
                     <input  v-model="form.categoryname" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('categoryname') }" id="division" placeholder="Category Name">
                        <has-error :form="form" field="categoryname"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/categorylist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditCategory',
       created () {
            document.title = "Edit Category";
        },
      mounted(){
          axios.get(`/admin/editcategory/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.category)
          })
      },
        data(){
        return {
          form: new Form({
            categoryname:'',
          })
          
        }
    },
    
    
    methods: {
      updateCategory(){
        this.form.patch('/admin/updatecategory/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Category Update Successfull')],[this.$router.push('/admin/categorylist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>