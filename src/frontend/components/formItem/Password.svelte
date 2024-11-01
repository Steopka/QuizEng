<script>
export let placeholder = 'press me'

export let value = '';

</script>


<label for="quizeng-password"></label>
<input type="password" class="input" id="quizeng-password" placeholder='{placeholder}' bind:value={value}>


<style>
.input {
    display: block;
    margin-bottom: 5px;
}
</style>