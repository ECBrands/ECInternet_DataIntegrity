# Magento2 Module ECInternet_DataIntegrity
``ecinternet_dataintegrity - 1.0.0.0``

- [Requirements](#requirements-header)
- [Overview](#overview-header)
- [Installation](#installation-header)
- [Configuration](#configuration-header)
- [Design Modifications](#design-modifications-header)
- [Specifications](#specifications-header)
- [Attributes](#attributes-header)
- [Notes](#notes-header)
- [Version History](#version-history-header)

## Requirements

## Overview

## Installation Instructions
- Unzip the zip file in `app/code/ECInternet`
- Enable the module by running `php bin/magento module:enable ECInternet_DataIntegrity`
- Apply database updates by running `php bin/magento setup:upgrade`
- Flush the cache by running `php bin/magento cache:flush`

## Configuration

## Specifications

## Attributes

## Features
#### Report pages for the following cases:
- Category link includes CategoryId 

## Notes
### Report Ideas
- Shipments where all items have shipped, but the status is not `fully shipped` (OrderFeatures)
- Multiple `Customer` records with same `customer_number` attribute value
    ```mysql
    SELECT cev.`value`, COUNT(*) as 'count'
    FROM `customer_entity_varchar` cev
  
    INNER JOIN `eav_attribute` eav
    ON cev.`attribute_id` = eav.`attribute_id`

    INNER JOIN `eav_entity_type` eet
    ON eav.`entity_type_id` = eet.`entity_type_id`
    
    WHERE eet.`entity_type_code` = 'customer' AND eav.`attribute_code` = 'customer_number'
    GROUP BY cev.`value`
    ```
- `url_rewrite` records for deleted products
  ```mysql
  SELECT
    *
  FROM
    `url_rewrite`
  WHERE
    `entity_type` = 'product' AND `entity_type` NOT IN (
      SELECT `entity_id` FROM `catalog_product_entity`
    )
  ``` 
- `url_rewrite` records for deleted categories
  ```mysql
  SELECT
    *
  FROM
    `url_rewrite`
  WHERE
    `entity_type` = 'category' AND `entity_id` NOT IN (
      SELECT `entity_id` FROM `catalog_category_entity`
    )
  ```
- `url_rewrite` records for products no longer in category


## Known Issues

## Version History
