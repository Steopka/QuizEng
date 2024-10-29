<script>
   export let placeholder = 'press me'

   export let value = '';

   </script>


<label for="quizeng-text"></label>
<input class="input" id="quizeng-text" placeholder='{placeholder}' bind:value={value}>


<style>
   .input {
      display: block;
      margin-bottom: 5px;
   }
</style>