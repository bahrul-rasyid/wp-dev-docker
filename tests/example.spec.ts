import { test, expect } from '@playwright/test';

test('test', async ({ page }) => {
  await page.goto('http://localhost/');
  
  await expect(page.getByRole('banner').getByRole('link', { name: 'WP Dev Docker' })).toBeVisible();
});