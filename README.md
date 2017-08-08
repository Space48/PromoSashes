# PromoSashes
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Space48/PromoSashes/badges/quality-score.png?b=master&s=c58c517cc59877fc663b99be3868fe3f400d31fc)](https://scrutinizer-ci.com/g/Space48/PromoSashes/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Space48/PromoSashes/badges/build.png?b=master&s=d6bf7e531a681c6c6889bcd5f869b3adeb5e8523)](https://scrutinizer-ci.com/g/Space48/PromoSashes/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/Space48/PromoSashes/badges/coverage.png?b=master&s=e21c2b215aed41d3fe622b6347bbf7c2b32f312c)](https://scrutinizer-ci.com/g/Space48/PromoSashes/?branch=master)

Simple Magento2 extension to show promotional sashes (New) on catalog product list page.

<img width="1266" alt="jackets_-_tops_-_women" src="https://cloud.githubusercontent.com/assets/1080386/24243493/4216d454-0fb3-11e7-9c7e-55784cca2721.png">


## Installation

**Manually:**

To install this module copy the code from this repo to `app/code/Space48/PromoSashes` folder of your Magento 2 instance, then you need to run php `bin/magento setup:upgrade`

**Via composer:**

From the terminal execute the following:

`composer config repositories.space48-promosashes vcs git@github.com:Space48/PromoSashes.git`

then

`composer require "space48/promosashes:{module-version}"`

**Using Modman:**

From the terminal execute the following:

`modman clone git@github.com:Space48/PromoSashes.git`

## How to use it

Once installed, go to the `Admin Penel -> Stores -> Configuration -> Space48 -> PromoSashes` and `enable` the extension.

Then, choose a product and set `new from date` and `new to date` values.

The sash will show during the specified period.

