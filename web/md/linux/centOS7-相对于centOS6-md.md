当前仅支持64位CPU。可以将32位操作系统作为虚拟机运行，包括之前的RHEL版本。
包含 Kernel 3.10 版本，支持 swap 内存压缩可保证显著减少 I/O 并提高性能，采用 NUMA (统一内存访问) 的调度和内存分配，支持 APIC (高级程序中断控制器) 虚拟化，全面的 DynTick 支持，将内核模块列入 黑名单，kpatch 动态内核补丁 (技术预览) 等等。
存储和文件系统方面，使用 LIO 内核目标子系统，支持快速设备为较慢的块设备提供缓存，引进了 LVM 缓存 (技术预览)，将 XFS 作 为默认的文件系统。
引进网络分组技术作为链路聚集的捆绑备用方法，对 NetworkManager 进行大量改进，提供动态防火墙守护进程 firewalld，加入 DNSSEC 域名系统安全扩展，附带 OpenLMI 用来管理 Linux 系统提供常用的基础 设施，引进了可信网络连接功能 (技术预览)等。
对 KVM (基于内核的虚拟化) 提供了大量改进，诸如使用 virtio-blk-data-plane 提高快 I/O性能 (技术预览)，支持 PCI 桥接，QEMU 沙箱，多队列 NIC， USB 3.0 支持 (技术预览) 等。
引入 Linux 容器 Docker。
编译工具链方面，包含 GCC 4.8.x、glibc 2.17、GDB 7.6.1。
包含 Ruby 2.0.0、Python 2.7.5、Java 7 等编程语言。
包含 Apache 2.4、MariaDB 5.5、PostgreSQL 9.2 等。
在系统和服务上，使用 systemd 替换了 SysV。
引入 Pacemaker 集群管理器，同时使用 keepalived 和 HAProxy 替换了负载均衡程序 Piranha。
此外，还对安装程序 Anaconda 进行了重新设计和增强，并使用 引导装载程序 GRUB 2
