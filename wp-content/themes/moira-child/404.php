<?php get_header(); ?>

<main id="primary" class="site-main error-404-moira">
  <section class="error-container">

    <div class="error-content">
      <h1 class="error-title">404</h1>
      <h2 class="error-subtitle">SE NOS PERDIÓ EL HILO.</h2>
      <p class="error-text">
        A veces, las mejores historias toman un desvío. <br>
        No encontramos lo que buscabas, pero el café sigue caliente.
      </p>

      <div class="error-cta">
        <a href="<?php echo home_url(); ?>" class="button-moira">
          BACK TO THE RITUAL
        </a>
      </div>
    </div>

  </section>
</main>

<style>
  .error-404-moira {
    background-color: #F2EFDC;
    /* Crema de la marca */
    height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #5E5C59;
    /* Gris */
    font-family: 'Helvetica', sans-serif;
  }

  .error-title {
    font-family: 'Impact', sans-serif;
    font-size: 120px;
    color: #B65835;
    /* Terracota */
    margin: 0;
    line-height: 1;
  }

  .error-subtitle {
    font-family: 'Dupincel', serif;
    font-style: italic;
    font-size: 2rem;
    margin-bottom: 20px;
  }

  .error-text {
    font-size: 1.1rem;
    margin-bottom: 40px;
    line-height: 1.6;
  }

  .button-moira {
    background-color: #B65835;
    color: #FFFFFF;
    padding: 15px 35px;
    text-decoration: none;
    font-weight: bold;
    letter-spacing: 1px;
    transition: opacity 0.3s;
  }

  .button-moira:hover {
    opacity: 0.9;
  }
</style>

<?php get_footer(); ?>