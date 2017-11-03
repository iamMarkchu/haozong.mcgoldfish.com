<template>
    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">音乐库</h3>
                    </div>
                    <div class="panel-body">
                        <a href="javascript:;" class="btn btn-success" @click="add()">添加音乐</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">添加音乐</h4>
              </div>
              <div class="modal-body">
                <form id="addForm">
                  <div class="form-group">
                    <label>歌曲名</label>
                    <input name="name" type="text" class="form-control" placeholder="歌曲名" v-model="music.name">
                  </div>
                  <div class="form-group">
                    <label>歌词</label>
                    <textarea name="lyrics" cols="30" rows="10" class="form-control" v-model="music.lyrics"></textarea>
                  </div>
                  <div class="form-group">
                    <label>音频链接</label>
                    <input name="music_file" type="text" class="form-control" placeholder="音频链接" v-model="music.music_file">
                  </div>
                  <div class="form-group">
                    <label>封面链接</label>
                    <input name="image" type="text" class="form-control" placeholder="封面链接" v-model="music.image">
                  </div>
                  <div class="form-group">
                    <label>作者</label>
                    <input name="author" type="text" class="form-control" placeholder="作者" v-model="music.author">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" @click="insert()">提交</button>
              </div>
            </div>
          </div>
        </div>
    </main>
</template>

<script>
    export default {
        name: 'main',
        data () {
            return {
                music: {
                    name: '',
                    lyrics: '',
                    image: '',
                    music_file: '',
                    author: ''
                }
            }
        },
        methods: {
            add: function(){
                $('#addModal').modal()
            },
            insert: function(){
              let that = this
              let form = document.getElementById('addForm')
              let formData = new FormData(form)
               window.axios.post('/admin/music', formData)
                .then(function (response){

                }).catch(function (error){
                    console.log(error.response.data);
              });
            }
        }
    }
</script>

<style scoped>

</style>
