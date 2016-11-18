<?php
use \Octopus\Database\ConnectionDriverResolver;

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class ConnectionDriverResolverTest extends PDOExt
{
    protected $resolver;

    protected function setUp()
    {
        $this->resolver = new ConnectionDriverResolver();
    }

    public function testCreatingConnectionDriverResolver()
    {
        $this->assertInstanceOf(ConnectionDriverResolver::class, $this->resolver);
    }

    public function testConnectionDriverResolver()
    {
        $this->resolver->register('mysql', function () {
            return $this->createMock(\Octopus\Database\Connectors\MysqlConnector::class);
        });

        $this->assertInstanceOf(\Octopus\Database\Connectors\MysqlConnector::class, $this->resolver->resolve('mysql'));
    }

    public function testInvalidDriverException()
    {
        try {
            $this->resolver->resolve('notExistingDriver');
        } catch (Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }
    }
}