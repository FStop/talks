# WooCommerce Talk Notes

## Intro
Gabe, F-Stop Design, twitter, etc. I primarily do WordPress development, using WordPress to build websites for my clients. I do custom theming, which for me means I take a blank starter theme like Underscores or Bones, plug my own design into it, and customize it, both on the front end and in the admin area, to suit the project . 

I'm going to talk about WooCommerce, which is a fully featured e-commerce plugin for WordPress that allows you to quickly get up and running with an online shop.

I'm in the final stages of an e-commerce project built on WooCommerce. The website I'm building is based a custom WordPress theme (of course), and I've had to get pretty deep into the inner workings of WooCommerce to get things looking and working the way the client and I need them to, so I thought I'd share some of my experiences.

## Overview

WooCommerce a [free, open source plugin](link to github repo) with [premium add ons](link to add ons page). So that's how they make their money. We as WordPress users are used to a lot  of nice tools being free, but good things do tend to cost money, especially with something as complex as e-commerce.

The fact that you can get the fully functioning plugin for free get everything set up, see how it works with your theme etc is a great argument for the free plugin/premium add ons model.

The interface and features are well thought out.

## Key Features
- Easy setup*
	- asterix: very easy if your theme has WooCommerce support, a bit more complicated if it doesn't. I'll get to that in a minute, but for now let's take a look at some key features
	- demo admin area
	- show pages auto created
- Everything is there for adding & managing products
	- demo add product
	- Simple vs Variable
		- demo creating variations
		- demo complex variations
	- Images
		- featured
		- gallery
	- checkout
	- widgets
- *Adding theme support
	- if your theme does not have WooCommerce support, you will need to add some code to the theme's functions.php file, or wherever you prefer to have your includes.
	- WooCommerce walks you through what's needed.
	- basically you're just telling WooCommerce where the content area of your theme is in the markup, so it knows how to fit into your theme
	- Echo html structure of theme's page.php
- Supports Twentytwelve
- WooThemes
- 
## Customization
- As soon as you want to do something that is not in the default setup, things get more complicated
- Most templates can be overridden buy copying files from ~/wp-content/plugins/woo-commerce/templates/ to /wp-content/themes/your-theme/woocommerce/
	- example...
- Not all things can be changed by overriding templates, because they are built with "hooks" within the plugin core. But even these can be tweaked.
	-  Find the action that activates the feature that you want to edit
	- use `remove-action()` to "unhook" the default woocommerce action
	- use `add-action()` to "rehook" an action of your own.
	- example..
		- Use code search tool to find the action I needed to customize within the plugin
		- copy the action code into my theme include file
		- unhook the WooCommerce action with `remove-action`
		- hook mine up with `add-action`
		- edit my copy to do what I want it to do
## Final Thoughts