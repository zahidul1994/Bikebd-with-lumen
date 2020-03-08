<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Front Tyre</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateFronttyre">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="ftyre">Front Tyre</label>
                     <input  v-model="form.ftyre" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('ftyre') }" id="ftyre" placeholder="Front Tyre ">
                        <has-error :form="form" field="ftyre"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/ftyrelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditFrontTyre',
       created () {
            document.title = "Edit Front Tyre";
        },
      mounted(){
          axios.get(`/admin/editftyre/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.ftyre)
          })
      },
        data(){
        return {
          form: new Form({
            ftyre:'',
          })
          
        }
    },
    
    
    methods: {
      updateFronttyre(){
        this.form.patch('/admin/updateftyre/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Front Tyre Update Successfull')],[this.$router.push('/admin/ftyrelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>