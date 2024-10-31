<script>
   import Form from "../components/form/FormAuthorization.svelte"

   const handleFormSubmit = (data) => {
      console.log('Данные формы:', data.detail)
   }

   // Отправка данных на сервер, обработка данных
</script>

<main>
   <Form on:mySubmit = {handleFormSubmit}></Form>
</main>

<style>
   main {
      position: relative;
      text-align: center;
      padding: 1em;
      max-width: 240px;

      overflow: hidden;

      height: 100%;

      display: flex;
      align-items: center;
      justify-content: center;
   }

   @media (min-width: 640px) {
      main {
         max-width: none;
      }
   }
</style>