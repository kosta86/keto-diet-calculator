<?php

$data = file_get_contents("php://input");

?>
<nav class="mainNavbar navbar navbar-expand-lg" style="margin-top:10px;">
  <div class="container">
    <div class="navbar-brand" style="margin: auto;">
      <img src="/images/logo.svg?v2" alt="KetoCycle.Diet" class="regular-logo">
    </div>
  </div>
</nav>
<div id="app" class="results-2 results-3 c-content" data-gender="male">
  <div class="summary-container c-maincontent">
    <div class="container container-intro">
      <h3 style="max-width: 740px;">Vas keto plan</h3>
      <p class="subheading">
        Based on your answers, you will be...
      </p>
      <div class="b-blocks-featured">
        <div class="b-result b-result--weight">
          <div class="b-stats">
            <div class="b-stats--header">
              <p>79</p>
              <p>78</p>
              <p class="e-special">77 <span>kg</span></p>
              <p>76</p>
              <p>75</p>
            </div>
            <div class="b-stats--footer">
              <p>
                by
                <span class="e-month">April</span>,
                <span class="e-year">2020</span>
              </p>
            </div>
          </div>
          <div class="b-months">
            <div class="b-stats--header">
              <p>Mar</p>
              <p>
                <b>Apr</b>
              </p>
            </div>
            <div class="b-stats--results">
              <div class="b-stats--results--from">
                86
                <span>kg</span>
              </div>
              <div class="b-stats--results--to">
                77
                <span>kg</span>
              </div>
            </div>
          </div>
        </div>
        <div class="b-result b-result--text">
          <div class="b-stats--header">
            87 <span>%</span>
          </div>
          <div class="b-stats--footer">
            Similar people
            <b>lost</b> more than
            <span class="e-special">
              10
            </span>
            <b>kg</b>
            on Keto
          </div>
        </div>
        <div class="b-result b-result--firstweek">
          <div class="b-stats--header">
            <div class="b-days">
              <div class="b-day">
                <span class="e-name">Mon</span>
                <span class="e-number">1</span>
              </div>
              <div class="b-day">
                <span class="e-name">Tue</span>
                <span class="e-number">2</span>
              </div>
              <div class="b-day">
                <span class="e-name">Web</span>
                <span class="e-number">3</span>
              </div>
              <div class="b-day">
                <span class="e-name">Thu</span>
                <span class="e-number">4</span>
              </div>
              <div class="b-day">
                <span class="e-name">Fri</span>
                <span class="e-number">5</span>
              </div>
              <div class="b-day">
                <span class="e-name">Sat</span>
                <span class="e-number">6</span>
              </div>
              <div class="b-day">
                <span class="e-name">Sun</span>
                <span class="e-number">7</span>
              </div>
            </div>
          </div>
          <div class="b-stats--footer">
            <div class="e-special">
              <span>-3</span> kg
            </div>
            <p>After first week</p>
          </div>
        </div>
        <button class="btn btn-primary scroll-btn"><span>Get your plan</span>
        </button>
      </div>
      <div class="summary">
        <h2>Personal summary</h2>
        <div class="row">
          <div class="col-12 col-md-6">
            <div id="bmi" class="b-result results-box">
              <div class="e-row is-selected">
                <span class="e-value"><span class="e-number">25.44</span> BMI</span>
                <span class="e-name">Overweight</span>
              </div>
              <div class="e-row ">
                <span class="e-value"><span class="e-number">25.44</span> BMI</span>
                <span class="e-name">Normal</span>
              </div>
              <div class="e-row ">
                <span class="e-value"><span class="e-number">25.44</span> BMI</span>
                <span class="e-name">Underweight</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div id="intake" class="b-result results-box">
              <div class="e-heading">
                Daily calorie intake
              </div>
              <div class="e-value">
                <div class="daily-norm">
                  <span><?php echo $data ?></span>
                </div>
              </div>
              <div class="e-measurement">kCal</div>
              <img src="https://ketocycle.diet/images/daily-calorie.png" alt="">
            </div>
          </div>
          <div class="col-12 col-md-6 cr">
            <div id="body-parts" class="b-result results-box">
              <div class="e-heading">
                Body change estimations
              </div>
              <img src="https://ketocycle.diet/images/body-change-estimations.png" alt="">
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div id="meals" class="results-box">
              <div class="meal-count" style="max-width: 240px;width: 100%;margin: auto;left: 0;right: 0;">
                <span>1000+</span>
              </div>
              <img src="/images/unique-recipes.png">
              <p>Unique food variations for you</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="covered">
      <div class="heading">Keto Diet was covered in</div>
      <div class="covered-logos">
        <img src="/images/covered-1.png" alt="Health Insider">
        <img src="/images/covered-2.png" alt="Business Insider">
        <img src="/images/covered-3.png" alt="New york times">
      </div>
    </div>
    <div class="container" id="summary-footer">
      <div class="row">
        <div class="container">
          <div class="b-ourpromise">
            <h2>OUR PROMISE</h2>
            <p class="e-text">
              We believe in a balanced way to lose weight and keep the weight off. We know that most
              of the diets or weight loss programs that you have tried in the past don’t work - they
              are just too hard to follow. Enormous food cravings, friends that visit you with a
              bottle of wine, that freshly baked cheesecake… Everything affects your journey and if
              your diet is not easy-to-follow, you are not going to achieve your results.
              <br><br>
              Don’t blame yourself. It’s really hard. That’s why our nutritionists and personal
              coaches work around the clock to prepare the most personalized plans you love. We want
              to make sure that it becomes a part of your life. We don’t change habits, we help you to
              improve them.
              <br><br>
              Try it out and we guarantee you will be satisfied.
            </p>
            <div class="b-namesurname" style="display:flex;align-items: center;justify-content: flex-start;">
              <div class="b-namesurname-namesurname" style="padding-right: 30px;">
                <p class="e-heading">Head of Nutrition,</p>
                <p class="e-subtitle">Christine Ellis</p>
              </div>
              <img style="margin-left: 0;margin-right: auto;left: 0;position: relative;    margin-top: 30px;" src="https://ketocycle.diet/images/signature.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container what-you-get-block">
      <div class="summary">
        <h2>What you get</h2>
        <div class="what-you-get">
          <div class="demo">
            <img src="/images/demo.png" alt="What you get" class="demo-img">
          </div>
          <div class="features-listed">
            <div class="feature">
              <strong>The know-how for beginners</strong>
              Quickly understand how Keto works and how to avoid common mistakes.
            </div>
            <div class="feature">
              <strong>Personalized Keto Meal Plan</strong>
              Get simple recipes and enjoy delicious meals. Portion sizes have been calculated specifically for you.
            </div>
            <div class="feature">
              <strong>Quick and lasting results</strong>
              Reach personal wellness goals and sustain them
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container e-actionbar">
      <div class="e-actionbar-inner" style="max-width: 400px;margin: auto;margin-bottom: 60px;">
        <a href="/email/3e4e35aaffd24a56b51c87e17f2c303e" class="btn btn-primary" data-name="seemore" name="email">
          <span>Get it now</span>
        </a>
      </div>
    </div>
  </div>
</div>
