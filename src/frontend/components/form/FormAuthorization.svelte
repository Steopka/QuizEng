<script>
    import Input from "../formItem/Input.svelte";
    import Button from "../formItem/Button.svelte";
    import Password from "../formItem/Password.svelte"

    import H2 from "../titleItem/H2.svelte";
    import A from "../titleItem/Link.svelte"


    import { createEventDispatcher } from "svelte";

    let text = {
        inputL: 'login',
        inputP: 'password',
        titleT: 'authorization',
        titleA: 'click me',
        href: '#',
    }

    const dispath = createEventDispatcher();

    let login = ''
    let password = ''

    const handleSubmit = () => {
        dispath('mySubmit', {login, password});
    }
    
</script>

<div class="container">
    <form class="form" on:submit|preventDefault = { handleSubmit } >

        <H2 titleH2 = { text.titleT }></H2>
        <Input bind:value = { login } placeholder = { text.inputL }/> 
        <Password bind:value = { password } placeholder = { text.inputP }/>
        <Button class='button'></Button>
        <A title = { text.titleA } href = { text.href }></A>
    </form>
</div>

<style>
    .container {
        display: flex;
        justify-content: center;
        flex-direction: column;
        position: relative;
    }

    .form {
        padding: 20px;
        box-shadow: 0 3px 30px rgba(0, 0, 0, 0.2);

        border-radius: 10px;
        background-color: #fff;

        z-index: 100;
    }

</style>