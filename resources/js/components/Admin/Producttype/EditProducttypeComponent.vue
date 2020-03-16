<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Product Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateProducttype">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="producttype">Product Type</label>
                     <input  v-model="form.producttype" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('producttype') }" id="producttype" placeholder="Product Type Name">
                        <has-error :form="form" field="producttype"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/producttypelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditProducttype',
       created () {
            document.title = "Edit Product Type";
        },
      mounted(){
          axios.get(`/admin/editproducttype/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.producttype)
          })
      },
        data(){
        return {
          form: new Form({
            producttype:'',
          })
          
        }
    },
    
    
    methods: {
      updateProducttype(){
        this.form.patch('/admin/updateproducttype/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Producttype Update Successfull')],[this.$router.push('/admin/producttypelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>