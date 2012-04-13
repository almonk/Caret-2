<?=form_open('admin/save_template/' . base64_encode($this->uri->segment(3) )) ?>
<div class="row">
	<div class="eight columns">
		<h4><?=$title?></h4>
		<br/>
	</div>

	<div class="four columns" style="text-align:right;">
		<input type="submit" value="Save changes"/>
	</div>
</div>

<div class="row">
	<div class="twelve columns">
		<textarea class="input" id="code" style="width: 100%;height:650px;font-family:courier;" name="content"><?=$content?></textarea>
	</div>
</div>

</form>

<script type="text/javascript">
      var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        lineNumbers: true
      });
</script>