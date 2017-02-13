<?php
/**
 * Joomla! Framework Website
 *
 * @copyright  Copyright (C) 2014 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

namespace Joomla\FrameworkWebsite\Renderer;

use Joomla\Application\AbstractApplication;
use Joomla\Application\AbstractWebApplication;
use Symfony\Component\Asset\Context\ContextInterface;

/**
 * Joomla! application aware context
 *
 * @since  1.0
 */
class ApplicationContext implements ContextInterface
{
	/**
	 * Application object
	 *
	 * @var    AbstractApplication
	 * @since  1.0
	 */
	private $app;

	/**
	 * Constructor
	 *
	 * @param   AbstractApplication  $app  The application object
	 *
	 * @since   1.0
	 */
	public function __construct(AbstractApplication $app)
	{
		$this->app = $app;
	}

	/**
	 * Gets the base path.
	 *
	 * @return  string  The base path
	 *
	 * @since   1.0
	 */
	public function getBasePath()
	{
		return rtrim($this->app->get('uri.base.path'), '/');
	}

	/**
	 * Checks whether the request is secure or not.
	 *
	 * @return  boolean
	 *
	 * @since   1.0
	 */
	public function isSecure()
	{
		if ($this->app instanceof AbstractWebApplication)
		{
			return $this->app->isSslConnection();
		}

		return false;
	}
}
