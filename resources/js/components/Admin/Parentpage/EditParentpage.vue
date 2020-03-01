<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Parent Page</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateParentpage">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="parentpage">Parent Page</label>
                     <input  v-model="form.parentpage" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('parentpage') }" id="parentpage" placeholder="Parent Page">
                        <has-error :form="form" field="parentpage"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/parentpagelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditParentpage',
       created () {
            document.title = "Edit Parent Page";
        },
      mounted(){
          axios.get(`/admin/editparentpage/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.parentpage)
          })
      },
        data(){
        return {
          form: new Form({
            parentpage:'',
          })
          
        }
    },
    
    
    methods: {
      updateParentpage(){
        this.form.patch('/admin/updateparentpage/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({response }) => { [toastr.success('Parent Page Update Successfull')],[this.$router.push('/admin/parentpagelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>