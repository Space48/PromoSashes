# PromoSashes
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

